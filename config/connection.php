<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "proyectophp";
  $conexion = new mysqli($host, $user, $password, $database);
  if($conexion->connect_error){
    die("Error en la conexion: " . $conexion->connect_error);
  }
?>