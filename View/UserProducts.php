<?php
  $APP_URL = 'http://localhost/PPHP';
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!isset($_SESSION['user_type'])) {
    header("Location:" . $APP_URL . "/View/UserHome.php"); 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "./Templates/head.php" ?>
</head>
<body class="ba-gray-100 flex flex-col justify-between h-screen">
  <?php require_once "./Templates/header.php" ?>

  <div class="products-container bg-gray-200 flex items-center justify-around h-screen">
    <div class="max-w-sm mx-auto bg-white shadow-md rounded-lg overflow-hidden">
      <img class="w-full h-48 object-cover" src="https://via.placeholder.com/150" alt="Producto">
      <div class="p-4">
        <h3 class="text-xl font-bold mb-2">Nombre del Producto</h3>
        <p class="text-gray-700 text-base mb-4">Una breve descripción del producto podría ir aquí.</p>
        <div class="flex items-center justify-between">
          <span class="text-2xl text-green-500 font-semibold">$99.99</span>
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Comprar</button>
        </div>
      </div>
    </div>

  </div>

  <script src="../Backend/js/UserProducts.js"></script>
  <?php require_once "./Templates/footer.php" ?>
</body>
</html>