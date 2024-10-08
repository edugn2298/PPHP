<?php
  include "../config/connection.php";
  include "../Backend/ProductsModel.php";
  if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    require_once "../Backend/ProductsModel.php";
    $product_Model = new ProductsModel(this->conexion);
    $product_Model->insertProduct($this->conexion,$name,$description,$price);
  }

  class ProductsController{
  public function __construct($conexion){
    $this->conexion = $conexion;
  }

  public function ProductsProcessCreate(){

  }


  public function ProductsProcessUpdate(){
  
  }

    public function ProductsProcessDelete(){
  }

    public function ProductsProcessGetAll(){
  }

    public function ProductsProcessGetOne(){
  }

}