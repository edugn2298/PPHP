<?php
class ProductsModel{
  public function getAllProducts($conexion){
    $stmt = $conexion->prepare("SELECT id, name, description, price FROM Products");
    if ($stmt === false) {
        return [];
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    $products = $result->fetch_all(MYSQLI_ASSOC);
    return $products;  
    
  } 
  

  public function getProductById($conexion,$id){
    $stmt = $conexion->prepare("SELECT id, name, description, price FROM Products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    return $product;
  }

  public function deleteProduct($conexion,$id){
    $stmt = $conexion->prepare("DELETE FROM Products WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
      return json_encode(['success' => true, 'message' => 'Producto eliminado correctamente']);
    } else {
      return json_encode(['success' => false, 'message' => 'Error al eliminar el producto']);
    }
  }

  public function insertProduct($conexion, $post_data, $file) {
    // Paso 1: Insertar producto sin imagen
    $stmt = $conexion->prepare("INSERT INTO Products (name, description, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $post_data['name'], $post_data['description'], $post_data['price']);
    
    if ($stmt->execute()) {
        // Obtener el ID del producto insertado
        $product_id = $conexion->insert_id;

        // Verificar si hay un archivo para actualizar
        if (isset($file['tmp_name']) && !empty($file['tmp_name'])) {
            // Utilizar el ID del producto como nombre del archivo
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION); // Obtener la extensión del archivo
            $fileName = $product_id . '.' . $extension; // Crear el nuevo nombre del archivo
            $destination = "../uploads/" . basename($fileName);
            move_uploaded_file($file['tmp_name'], $destination);

            // Paso 2: Actualizar producto con la imagen
            $stmt = $conexion->prepare("UPDATE Products SET image_filename = ? WHERE id = ?");
            $stmt->bind_param("si", $fileName, $product_id);
            
            if ($stmt->execute()) {
                return json_encode(['success' => true, 'message' => 'Producto creado y imagen almacenada correctamente']);
            } else {
                error_log("Error al actualizar imagen del producto: " . $stmt->error);
                return json_encode(['success' => false, 'message' => 'Error al actualizar imagen del producto']);
            }
        } else {
            return json_encode(['success' => true, 'message' => 'Producto creado sin imagen']);
        }
    } else {
        error_log("Error al insertar producto: " . $stmt->error);
        return json_encode(['success' => false, 'message' => 'Error al crear el producto']);
    }
}

  
  
  
  public function updateProduct($conexion, $post_data, $file) {
    $sql = "UPDATE Products SET name = ?, description = ?, price = ?";
    $params = [$post_data['name'], $post_data['description'], $post_data['price']];
    $paramTypes = 'sss'; // Tipos de parámetros para bind_param
    
    // Verificar si hay un archivo para actualizar
    if (isset($file['tmp_name']) && !empty($file['tmp_name'])) {
        // Utilizar el ID del producto como nombre del archivo
        $productId = $post_data['id'];
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION); // Obtener la extensión del archivo
        $fileName = $productId . '.' . $extension; // Crear el nuevo nombre del archivo
        $destination = "../uploads/" . basename($fileName);
        move_uploaded_file($file['tmp_name'], $destination);

        $sql .= ", image_filename = ?";
        $params[] = $fileName;
        $paramTypes .= 's'; // Añadir otro tipo de parámetro
    }
    
    // Completar el SQL con la condición WHERE
    $sql .= " WHERE id = ?";
    $params[] = $post_data['id'];
    $paramTypes .= 'i'; // Tipo de parámetro para id
    
    // Preparar y ejecutar la consulta
    $stmt = $conexion->prepare($sql);
    
    // Verificar si la preparación falló
    if ($stmt === false) {
        error_log("Error en la preparación de la consulta: " . $conexion->error);
        return json_encode(['success' => false, 'message' => 'Error en la preparación de la consulta']);
    }
    
    // Vincular los parámetros
    $stmt->bind_param($paramTypes, ...$params);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        return json_encode(['success' => true, 'message' => 'Producto actualizado correctamente']);
    } else {
        error_log("Error al ejecutar la consulta: " . $stmt->error);
        return json_encode(['success' => false, 'message' => 'Error al actualizar el producto']);
    }
}



  
}