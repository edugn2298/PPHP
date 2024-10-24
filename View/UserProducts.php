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
<body class="ba-gray-100 flex flex-col justify-between min-h-screen">
  <?php require_once "./Templates/header.php" ?>

  <div class="products-container bg-gray-200 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-4 min-h-screen">
  </div>
  <?php require_once "./Templates/footer.php" ?>
  <script src="../Backend/js/UserProducts.js"></script>
</body>
</html>