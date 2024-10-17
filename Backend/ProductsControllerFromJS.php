<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "proyectophp";
  $conexion = new mysqli($host, $user, $password, $database);
  if($conexion->connect_error){
    die("Error en la conexion: " . $conexion->connect_error);
  }
  
  include "../Backend/ProductsModelFromJS.php";


  class ProductsController{
  public function __construct($conexion){
    $this->conexion = $conexion;
  }

  public function CreateProduct($post_data, $file) {
    $productModel = new ProductsModel();
    $result = $productModel->insertProduct($this->conexion, $post_data, $file);
    echo $result;
  }


  public function UpdateProduct($post_data, $file) {
    $productModel = new ProductsModel();
    $result = $productModel->updateProduct($this->conexion, $_POST, $_FILES['file']);
    echo $result;
    
  }

    public function DeleteProduct($id){
      $productModel = new ProductsModel();
      $result = $productModel->deleteProduct($this->conexion, $id);
      echo $result;
  }

  public function ProductsGetAll() {
    $productModel = new ProductsModel();
    $result = $productModel->getAllProducts($this->conexion);
    echo json_encode($result);
}

    public function ProductsGetById($id){
      $productModel = new ProductsModel();
      $result = $productModel->getProductById($this->conexion, $id);
      echo json_encode($result);
  }

}

$productsController = new ProductsController($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $data = json_decode(file_get_contents('php://input'), true);
  $action = $data['action'] ?? $_POST['action'];

  // Start buffering
  ob_start();

  if ($action == 'CreateProduct') {
      if (isset($_FILES['file'])) {
          $productsController->CreateProduct($_POST, $_FILES['file']);
      } else {
          $productsController->CreateProduct($_POST, null);
      }
  } elseif ($action == 'GetProducts') {
      $productsController->ProductsGetAll();
  } elseif ($action == 'GetProductByID'){
      $productsController->ProductsGetById($data['product_id']);
  } elseif ($action == 'DeleteProductByID') {
      $productsController->DeleteProduct($data['product_id']);
  }elseif ($action == "UpdateProduct") {
    if (isset($_FILES['file'])) {
        $productsController->UpdateProduct($_POST, $_FILES['file']);
    } else {
      $productsController->UpdateProduct($_POST);
    }
  }else {
      echo json_encode(['success' => false, 'message' => 'Acción no válida']);
  }

  // Get buffer content
  $output = ob_get_clean();

  // Check for errors in output
  if (stripos($output, 'Fatal error') !== false) {
      echo json_encode(['success' => false, 'message' => 'Error en el servidor', 'error' => $output]);
  } else {
      echo $output;
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Método de solicitud inválido']);
}