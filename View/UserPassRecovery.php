<?php
  $APP_URL = 'http://localhost/PPHP';
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (isset($_SESSION['user_type'])) {
    header("Location: $APP_URL ./View/UserHome.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "./Templates/head.php"?>
</head>
<body class="ba-gray-100 flex flex-col justify-between h-screen">
  <?php require_once "./Templates/header.php" ?>
  <!-- Recovery Pass Email-->
  <div class="bg-gray-100 flex items-center justify-around h-screen">
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full mx-auto">
      <h2 class="text-2xl font-semibold mb-4">Recuperar contraseña</h2>
      <form id="form-recovery" method="post">
        <div class="mb-4">
          <label for="email" class="block text-gray-700">Email</label>
          <input type="email" id="recovery-email" name="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none">Recuperar</button>
          <p  class="text-sm">  <a href="./UserLoginRegister.php" id="register-link" class="text-blue-500 hover:underline">Volver al Inicio</a></p>
        </div>
      </form>
    </div>
  </div>
  <!-- Recovery Pass Email-->
  <!-- Recovery Pass -->
  <div class="bg-gray-100 flex items-center justify-around h-screen hidden">
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full mx-auto">
      <h2 class="text-2xl font-semibold mb-4">Cambiar contraseña</h2>
      <form id="form-recovery-pass" method="post">
        <div class="mb-4">
          <label for="password" class="block text-gray-700">Nueva Contrase a</label>
          <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
          <label for="confirm-password" class="block text-gray-700">Confirmar Contrase a</label>
          <input type="password" id="confirm-password" name="confirm-password" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none">Recuperar</button>
          <p  class="text-sm">  <a href="./UserLoginRegister.php" id="register-link" class="text-blue-500 hover:underline">Volver al Inicio</a></p>
        </div>
      </form>
    </div>
  </div>
  <!-- Recovery Pass -->
  <!-- Token -->
  <div class="bg-gray-100 flex items-center justify-around h-screen hidden">
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full mx-auto">
      <h2 class="text-2xl font-semibold mb-4">Ingresar Token</h2>
      <form id="form-token" method="post">
        <div class="mb-4">
          <label for="token" class="block text-gray-700">Token</label>
          <input type="text" id="token" name="token" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none">Ingresar</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Token -->
  <script type="module" src="../Backend/js/UserPassRecovery.js"></script>
  <?php require_once "./Templates/footer.php" ?>

</body>
</html>