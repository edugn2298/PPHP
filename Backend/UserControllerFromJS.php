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

include "../Backend/UserModelFromJS.php";

class UserController {
  private $conexion;

  public function __construct($conexion) {
    $this->conexion = $conexion;
  }

  public function GetUserById($user_id) {
    $user_Model = new UserModel();
    $user = $user_Model->GetUserById($this->conexion, $user_id);
    echo $user; // Devuelve los detalles del usuario en formato JSON
  }

  public function UpdateUser($user_data) {
    $user_Model = new UserModel();
    $update_result = $user_Model->UpdateUser($this->conexion, $user_data);
    echo $update_result;
  }

  public function DeleteUserByID($user_id){
    $user_Model = new UserModel();
    $result = $user_Model->DeleteUserByID($this->conexion, $user_id);
    echo $result;
  }

}

$user_controller = new UserController($conexion);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  if(isset($data['action'])){
    if ($data['action'] == 'GetUserById' && isset($data['user_id'])) {
      $user_controller->GetUserById($data['user_id']);
    } elseif ($data['action'] == 'UpdateUser') {
      $user_controller->UpdateUser($data);
    } elseif ($data['action'] == 'DeleteUserByID' && isset($data['user_id']) ){
      $user_controller->DeleteUserByID($data['user_id']);
    }
  } else {
    echo json_encode(['success' => false, 'message' => 'Acción no válida']);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Método de solicitud inválido']);
}


?>