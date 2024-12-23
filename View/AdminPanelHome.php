
<?php
  $APP_URL = 'http://localhost/PPHP'; 
  session_start();
  if (!isset($_SESSION['user_type'])) {
    header("Location:" . $APP_URL . "/View/AdminPanelLogin.php"); 
  }
  echo $_SESSION['user_type'],$_SESSION['email'],$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once "./Templates/head.php" ?> 
</head>
<body class="bg-gray-100">

  <div class="flex h-screen">
    <nav class="bg-gray-800 w-64 text-white">
      <div class="p-4">
        <span class="text-xl font-semibold">Panel Admin</span>
      </div>
      <ul class="space-y-2">
        <li><a href="<?php echo $APP_URL ?> ./View/AdminPanelHome.php" class="block p-4 hover:bg-gray-700">Dashboard</a>
        </li>
        <li><a href="<?php echo $APP_URL ?> ./View/AdminPanelProducts.php"
            class="block p-4 hover:bg-gray-700">Productos</a></li>
        <li><a href="<?php echo $APP_URL ?> ./View/AdminPanelUsers.php" class="block p-4 hover:bg-gray-700">Usuarios</a>
        </li>
        <li><a href="<?php echo $APP_URL ?> ./View/AdminPanelLogOut.php" class="block p-4  hover:bg-gray-700 ">Cerrar sesión</a></li>
      </ul>
    </nav>

    

  </div>
</html>
