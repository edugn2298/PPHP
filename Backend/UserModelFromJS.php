<?php
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
    $sql = "UPDATE Users SET name = ?, lastname = ?, email = ?, user_type = ?";
    $params = [$user_data['name'], $user_data['lastname'], $user_data['email'], $user_data['user_type']];
  
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

}
?>
