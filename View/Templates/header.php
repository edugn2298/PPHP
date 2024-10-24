<?php
  $APP_URL = 'http://localhost/PPHP';
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!isset($_SESSION['email'])) {
    echo '
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
      <div class="flex items-center">
        <img src="' . $APP_URL . '/img/mi-logo.webp" alt="Logo" class="h-8 w-24 mr-2">
        <span class="font-semibold text-lg">Proyecto PHP</span>
      </div>

      <div class="space-x-4">
        <a href="' . $APP_URL . '/View/UserHome.php" class="text-blue-500 hover:underline">Inicio</a>
        <a href="' . $APP_URL . '/View/UserLoginRegister.php?view=Register" class="text-blue-500 hover:underline">Registrarse</a>
        <a href="' . $APP_URL . '/View/UserLoginRegister.php?view=Login" class="text-blue-500 hover:underline">Iniciar sesión</a>
      </div>
    </header>
    ';
  } else if ($_SESSION['user_type'] == 'user') {
    echo '
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
      <div class="flex items-center">
        <img src="./img/mi-logo.webp" alt="Logo" class="h-8 w-24 mr-2">
        <span class="font-semibold text-lg">Proyecto PHP</span>
      </div>

      <div class="space-x-4">
        <a href="'. $APP_URL . '/View/UserHome.php" class="text-blue-500 hover:underline">Inicio</a>
        <a href="'. $APP_URL . '/View/UserProducts.php" class="text-blue-500 hover:underline">Productos</a>
        <a href="'. $APP_URL . '/View/UserMyAccount.php" class="text-blue-500 hover:underline">Mi Cuenta</a>
        <a href="'. $APP_URL . '/View/UserLogOut.php" class="text-blue-500 hover:underline">Cerrar sesión</a>
      </div>
    </header>
    ';
  } else if ($_SESSION['user_type'] == 'admin') {
    echo '
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
      <div class="flex items-center">
        <img src="./img/mi-logo.webp" alt="Logo" class="h-8 w-24 mr-2">
        <span class="font-semibold text-lg">Proyecto PHP</span>
      </div>

      <div class="space-x-4">
        <a href="'. $APP_URL . '/View/UserHome.php" class="text-blue-500 hover:underline">Inicio</a>
        <a href="'. $APP_URL . '/View/UserProducts.php" class="text-blue-500 hover:underline">Productos</a>
        <a href="'. $APP_URL . '/View/AdminPanelHome.php" class="text-blue-500 hover:underline">Administración</a>
        <a href="'. $APP_URL . '/View/UserMyAccount.php" class="text-blue-500 hover:underline">Mi Cuenta</a> 
        <a href="'. $APP_URL . '/View/UserLogOut.php" class="text-blue-500 hover:underline">Cerrar sesión</a>
      </div>
    </header>
    ';
  }
?>