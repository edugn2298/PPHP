
<?php
  $APP_URL = 'http://localhost/PPHP'; 
  session_start();
  if (isset($_SESSION['user_type'])) {
    header("Location:" . $APP_URL . "/View/AdminPanelHome.php"); 
  }
  
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
      </ul>
    </nav>

    <div class="container mx-auto p-4">
      <div class="flex items-center content-center justify-center h-full">
        <div id="login-form" class="bg-white p-8 rounded shadow-md max-w-md w-full mx-auto">
          <h2 class="text-2xl font-semibold mb-4">Iniciar Sesión</h2>
          <form id="form-login" method="post">
            <div class="mb-4">
              <label for="email" class="block text-gray-700">Email</label>
              <input type="email" id="login-email" name="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
              <label for="clave" class="block text-gray-700">Contraseña</label>
              <input type="password" id="login-password" name="clave" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex items-center justify-between">
              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none">Ingresar</button>
              <p  class="text-sm">  No tienes cuenta? <a id="register-link" class="text-blue-500 hover:underline">Registrarse</a></p>
            </div>
          </form>
        </div>
        <div id="register-form" class="bg-white p-8 rounded shadow-md max-w-md w-full mx-auto hidden">
          <h2 class="text-2xl font-semibold mb-4">Registrarse</h2>
          <form id="form-add" method="post">
          <div class="mb-4">
            <label for="name" class="block text-gray-700">Nombre</label>
            <input type="text" id="register-name" name="name" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="lastname" class="block text-gray-700">Apellido</label>
            <input type="text" id="register-lastname" name="lastname" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="register-email" name="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="user_type" class="block text-gray-700">Tipo de Usuario</label>
            <select name="user_type" id="register-user-type" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
              <option value="">-- Seleccione --</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
          <div class="mb-4">
            <label for="password" class="block text-gray-700">Contraseña</label>
            <input type="password" id="register-password" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="confirmar-clave" class="block text-gray-700">Confirmar Contraseña</label>
            <input type="password" id="register-password-confirm" name="confirmar-clave" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none">Registrarse</button>
            <p  class="text-sm">  Ya tienes cuenta? <a id="login-link" class="text-blue-500 hover:underline">Iniciar Sesión</a></p>
          </div>
          </form>
        </div>

      </div>
    </div>

    <script type="module" src="../Backend/js/AdminUserLogin-Register.js"></script>
  </div>
</html>
