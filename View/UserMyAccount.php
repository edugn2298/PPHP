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
<html lang="es">
<head>
  <?php require_once "./Templates/head.php" ?>
</head>
<body class="ba-gray-100 flex flex-col justify-between h-screen">
  <?php require_once "./Templates/header.php" ?>
  <div class="bg-gray-100 flex items-center justify-around h-screen">

    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
      <h2 class="text-2xl font-semibold mb-4">Actualizar Registro</h2>
        <form id="form-update" method="POST">
          <input type="hidden" id="update-id" name="user_id" value="<?php echo $_SESSION['id']; ?>">
          <div class="mb-4">
            <label for="name" class="block text-gray-700">Nombre</label>
            <input type="text" id="update-name" name="name" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="lastname" class="block text-gray-700">Apellido</label>
            <input type="text" id="update-lastname" name="lastname" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="update-email" name="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none">Registrarse</button>
        </form>
    </div>
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
      <h2 class="text-2xl font-semibold mb-4">Cambiar Contraseña</h2>
        <form id="password-update" method="POST">
          <input type="hidden" id="update-pass-id" name="user_id" value="<?php echo $_SESSION['id']; ?>">
          <div class="mb-4">
            <label for="name" class="block text-gray-700">Antigua Contraseña</label>
            <input type="password" id="old-password" name="name" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="name" class="block text-gray-700">Contraseña</label>
            <input type="password" id="password" name="name" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="lastname" class="block text-gray-700">Confirmar Contraseña</label>
            <input type="password" id="password-confirm" name="lastname" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none">Registrarse</button>
        </form>
    </div>
  </div>
  <?php require_once "./Templates/footer.php" ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
  <script type="module" src="../Backend/js/Myaccount.js"></script>
</body>
</html>