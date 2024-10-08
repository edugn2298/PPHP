<?php
  include "../config/connection.php";  
  class UserController{

    public function __construct($conexion){
      $this->conexion = $conexion;
    }

    public function GetAllUsers(){
      require_once "./UserModel.php";
      $user_Model = new UserModel();
      $users = $user_Model->GetAllUsers($this->conexion);
      return $users;
    }

    public function UserUpdate($id,$name,$lastname,$email,$user_type){

      require_once "./UserModel.php";
      $user_Model = new UserModel();
      $user_update_resultado = $user_Model->UpdatedUser($this->conexion,$id,$name,$lastname,$email,$user_type);

      if ($user_update_resultado){
        header("Location: ../Index.php" );
      } else {
        header("Location: ../View/UserMyAccount.php" );
      }
      
    }

    public function UserProcessRegister(){
      if(isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmar-clave']) && isset($_POST['user_type'])){
        $nombre = $_POST['name'];
        $apellido = $_POST['lastname'];
        $email = $_POST['email'];
        $clave = $_POST['password'];
        $user_type = $_POST['user_type'];
        require_once "./UserModel.php";

        $user_Model = new UserModel();
        $user_register_resultado = $user_Model->registerUser($this->conexion,$nombre,$apellido,$email,$clave,$user_type);

      if ($user_registro_resultado){
          header("Location: UserRegistroResultado.php" );
        } else {
          header("Location: UserRegistroResultado.php" );
        }      
    }
  }

  public function UserProcessLogin(){

    if(isset($_POST['email']) && isset($_POST['clave'])){
      $email = $_POST['email'];
      $clave = $_POST['clave'];
      require_once "./UserModel.php";
      $user_Model = new UserModel();
      $user_login_resultado = $user_Model->loginUser($this->conexion,$email,$clave);

      echo $_SESSION['id'],$_SESSION['email'],$_SESSION['user_type'];
      
      if ($user_login_resultado){
        header("Location: ../index.php" );

      } else {
        header("Location: ../index.php" );
      }
      
    }
  }

}

if(isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmar-clave']) && isset($_POST['user_type'])){
  echo "Se recibio el Post";
  $Registro = new UserController($conexion);
  $Registro->UserProcessRegister();

}else{
  echo "No se recibio el Post😒";
}

if(isset($_POST['email']) && isset($_POST['clave'])){
  echo "Se recibio el Post 😂😂";
  $Login = new UserController($conexion);
  $Login->UserProcessLogin();
}else{
  echo "No se recibio el Post😒😒";
}

if (isset($_POST['action']) && $_POST['action'] == 'update_user') {
  $id = $_POST['user_id'];
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $user_type = $_POST['user_type'];
  $user_update = new UserController($conexion);
  $user_update->UserUpdate($id,$name,$lastname,$email,$user_type);

  echo "Se recibio el action";
  echo $id;
} else{
  echo "No se recibio el action";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  if (isset($_GET['action']) && $_GET['action'] == 'GetAllUsers') {
    $user_controller = new UserController($conexion);
    $user_controller->GetAllUsers();
  }
} else {
    return json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}




?>
