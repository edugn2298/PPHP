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

  public function GetAllUsers() {
    $user_Model = new UserModel();
    $users = $user_Model->GetAllUsers($this->conexion);
    echo $users;
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

  public function CreateUser($user_data) {
    $user_Model = new UserModel();
    $create_result = $user_Model->CreateUser($this->conexion, $user_data);
    echo $create_result;
  }

  public function LoginUser($user_data) {
    $user_Model = new UserModel();
    $login_result = $user_Model->loginUser($this->conexion, $user_data['email'], $user_data['password']);
    echo $login_result;
  }

  public function updatedPassword($user_data) {
    $user_Model = new UserModel();
    $update_result = $user_Model->updatedPassword($this->conexion, $user_data);
    echo $update_result;
  }

  public function RecoveryPassword($user_data) {
    $user_Model = new UserModel();
    $update_result = $user_Model->RecoveryPassword($this->conexion, $user_data);
    echo $update_result;
  }

}

$user_controller = new UserController($conexion);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);

  if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['success' => false, 'message' => 'Error en la sintaxis JSON: ' . json_last_error_msg()]);
    exit;
  }

  if (!isset($data['action'])) {
    echo json_encode(['success' => false, 'message' => 'Acción no especificada']);
    exit;
  }

  switch ($data['action']) {
    case 'GetUserById':
      if (isset($data['user_id'])) {
        $user_controller->GetUserById($data['user_id']);
      } else {
        echo json_encode(['success' => false, 'message' => 'ID de usuario no especificado']);
      }
      break;

    case 'UpdateUser':
      $user_controller->UpdateUser($data);
      break;

    case 'DeleteUserByID':
      if (isset($data['user_id'])) {
        $user_controller->DeleteUserByID($data['user_id']);
      } else {
        echo json_encode(['success' => false, 'message' => 'ID de usuario no especificado']);
      }
      break;

    case 'CreateUser':
      $user_controller->CreateUser($data);
      break;

    case 'LoginUser':
      $user_controller->LoginUser($data);
      break;

    case 'GetAllUsers':
      $user_controller->GetAllUsers();
      break;

    case 'UpdatedPassword':
      $user_controller->updatedPassword($data);
      break;
    
    case 'RecoveryPassword':
      $user_controller->RecoveryPassword($data);
      break;
    
    case 'RecoveryPass':


    default:
      echo json_encode(['success' => false, 'message' => 'Acción no válida']);
      break;
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Método de solicitud inválido']);
}



?>