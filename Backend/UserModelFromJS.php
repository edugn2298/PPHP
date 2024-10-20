<?php
require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class UserModel {
  public function GetUserById($conexion, $user_id) {
    $stmt = $conexion->prepare("SELECT * FROM Users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();
      return json_encode($user);
    } else {
      return json_encode([]);
    }
  }

  public function UpdateUser($conexion, $user_data) {
    $sql = "UPDATE Users SET name = ?, lastname = ?, email = ?";
    $params = [$user_data['name'], $user_data['lastname'], $user_data['email']];

    if (!empty($user_data['user_type'])) {
      $sql .= ", user_type = ?";
      $params[] = $user_data['user_type'];
    }
  
    if (!empty($user_data['password'])) {
      $sql .= ", password = ?";
      $params[] = password_hash($user_data['password'], PASSWORD_BCRYPT);
    }
  
    $sql .= " WHERE id = ?";
    $params[] = $user_data['user_id'];
    
    $stmt = $conexion->prepare($sql);
    
    $stmt->bind_param(str_repeat('s', count($params) - 1) . 'i', ...$params);
    
    if ($stmt->execute()) {
      return json_encode(['success' => true, 'message' => 'Usuario actualizado correctamente']);
    } else {
      return json_encode(['success' => false, 'message' => 'Error al actualizar el usuario']);
    }
  }

  public function DeleteUserByID($conexion, $user_id) {
    $stmt = $conexion->prepare("DELETE FROM Users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        return json_encode(['success' => true, 'message' => 'Usuario eliminado correctamente']);
    } else {
        return json_encode(['success' => false, 'message' => 'Error al eliminar el usuario']);
    }
  }

  public function CreateUser($conexion, $user_data) {
    $password = password_hash($user_data['password'], PASSWORD_BCRYPT); // Encriptar la contraseña
    
    $sql = "INSERT INTO Users (name, lastname, email, password, user_type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssss", $user_data['name'], $user_data['lastname'], $user_data['email'], $password, $user_data['user_type']);
    
    if ($stmt->execute()) {
      return json_encode(['success' => true, 'message' => 'Usuario creado correctamente']);
    } else {
      return json_encode(['success' => false, 'message' => 'Error al crear el usuario']);
    }
  }

  public function loginUser($conexion, $email, $password) {
    $stmt = $conexion->prepare("SELECT * FROM Users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();
      if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_type'] = $user['user_type'];
        $_SESSION['id'] = $user['id']; 
        return json_encode(['success' => true, 'user' => $user['email']]);
      } else {
        return json_encode(['success' => false, 'message' => 'Contrasenya incorrecta']);
      }
    } else {
      return json_encode(['success' => false, 'message' => 'Usuario no encontrado']);
    }
  }
  
  public function GetAllUsers($conexion) {
    $stmt = $conexion->prepare("SELECT * FROM Users");
    $stmt->execute();
    $result = $stmt->get_result();
    $users = [];
    while ($user = $result->fetch_assoc()) {
      $users[] = $user;
    }
    return json_encode($users);
  }

  public function updatedPassword($conexion, $user_data) {
    $user_id = $user_data['user_id'];
    $stmt = $conexion->prepare("SELECT password FROM Users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if (!password_verify($user_data['old_password'], $user['password'])) {
      return json_encode(['success' => false, 'message' => 'Contrasenya incorrecta']);
    } else {
      $password = password_hash($user_data['new_password'], PASSWORD_BCRYPT); // Encriptar la contraseña
      $stmt = $conexion->prepare("UPDATE Users SET password = ? WHERE id = ?");
      $stmt->bind_param("si", $password, $user_data['user_id']);
      if ($stmt->execute()) {
        return json_encode(['success' => true, 'message' => 'Contrasenya actualizada correctamente']);
      } else {
        return json_encode(['success' => false, 'message' => 'Error al actualizar la contrasenya']);
      }
    }
    
  }

  public function RecoveryPassword($conexion, $user_data) {
    $email = $user_data['email'];
    $stmt = $conexion->prepare("SELECT COUNT(*) FROM Users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    if ($count > 0) {
      $mail = new PHPMailer(true);
      $token = bin2hex(random_bytes(32));
      $GLOBALS['token'] = $token;
      try {
        $mail->Debugoutput = 'html';
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'edugn2298@gmail'; //Correo de autenticacion de SMTP
        $mail->Password = 'czgf ozgm vfpi jtbv'; //Contraseña de autenticacion SMTP
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom("edugn2298@gmail.com");//Remitente
        $mail->addAddress($email);//Destinatario
        //Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Recuperar contrasenya';
        $mail->Body = 'Hola, esta es su contrasenya temporal: ' . $token;
        $mail->send();
        return json_encode(['success' => true, 'message' => 'Enviado correctamente']);
      } catch (Exception $e) {
        return json_encode(['success' => false, 'message' => 'Error al enviar']);
      }
    } else {
      return json_encode(['success' => false, 'message' => 'Usuario no encontrado']);
    }

  }

}
?>
