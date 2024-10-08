<?php
class ProductsModel{
  public function getProducts($conexion){
    $sql = ("SELECT * FROM Products");
    $result = $conexion->query($sql);
    return $result;
  }

  public function getProduct($conexion,$id){
    $sql = ("SELECT * FROM Products WHERE id = $id");
    $result = $conexion->query($sql);
    return $result;
  }

  public function deleteProduct($conexion,$id){
    $sql = ("DELETE FROM Products WHERE id = $id");
    $result = $conexion->query($sql); 
    return $result;
  }

  public function insertProduct($conexion,$name,$description,$price){
    $sql = ("INSERT INTO Products (name,description,price) VALUES('$name','$description','$price')");
    $result = $conexion->query($sql);
    return $result;
  }

  public function updateProduct($conexion,$id,$name,$description,$price){
    $sql = ("UPDATE Products SET name = '$name', description = '$description', price = '$price' WHERE id = $id");
    $result = $conexion->query($sql);
    return $result;
  }

  

}