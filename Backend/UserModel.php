<?php

  class UserModel{

  public function registerUser($conexion,$name, $lastname,$email,$password,$user_type){
    // Lógica para registrar un nuevo usuario en la base de datos
    $password = md5($password);
    $sql = ("INSERT INTO Users (name,lastname,email,password,user_type) VALUES('$name','$lastname','$email','$password','$user_type')");
    if ($conexion->query($sql) === TRUE) {
      echo "New record created successfully";
      return true; 
    } else {
      echo "Error: " . $sql . "<br>" . $conexion->error;
      return false;
    }
  }

  public function loginUser($conexion,$email,$password){
    // Lógica para iniciar sesión
    $password = md5($password);
    $sql = ("SELECT * FROM Users WHERE email = '$email' AND password = '$password'");
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
      session_start();
      $_SESSION['email'] = $email;
      $objetos = $result->fetch_assoc();
      $_SESSION['id'] = $objetos['id'];
      $_SESSION['user_type'] = $objetos['user_type'];
      echo $_SESSION['id'],$_SESSION['email'],$_SESSION['user_type'];

      return true;
    } else {
      return false;
    }
  }

  public function UpdatedUser($conexion,$id,$name,$lastname,$email,$user_type){

    $sql = "UPDATE Users SET name = '$name', lastname = '$lastname', email = '$email', user_type = '$user_type' WHERE id = '$id'";  

    if ($conexion->query($sql) === TRUE) {

      echo "Record updated";
      return true;
    } else {
      echo "Error updating record: " . $conexion->error;
      return false;
    }
    
  }

  public function GetAllUsers($conexion){
    $sql = ("SELECT * FROM Users");
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
      $result = $result->fetch_all(MYSQLI_ASSOC);
      echo $result;
      return json_encode($result);

    } else {
      return json_encode([]);
    }
  }
}
?>