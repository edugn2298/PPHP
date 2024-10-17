
<?php
  $APP_URL = 'http://localhost/PPHP'; 
  session_start();
  if (!isset($_SESSION['user_type'])) {
    header("Location:" . $APP_URL . "/View/AdminPanelLogin.php"); 
  } else if ($_SESSION['user_type'] != 'admin') {
    header("Location:" . $APP_URL . "./Index.php"); 
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
        <li><a href="<?php echo $APP_URL ?> ./View/AdminPanelHome.php" class="block p-4 hover:bg-gray-700">Dashboard</a></li>
        <li><a href="<?php echo $APP_URL ?> ./View/AdminPanelProducts.php" class="block p-4 hover:bg-gray-700">Productos</a></li>
        <li><a href="<?php echo $APP_URL ?> ./View/AdminPanelUsers.php" class="block p-4 hover:bg-gray-700">Usuarios</a></li>
        <li><a href="<?php echo $APP_URL ?> ./View/AdminPanelLogOut.php" class="block p-4  hover:bg-gray-700 ">Cerrar sesión</a></li>
      </ul>
  </nav>

  <div class="container mx-auto p-4">
    <div class="flex">
      <!-- Lado izquierdo: Formulario -->
      <div id="users_edit_form" class="w-1/2 p-4 bg-white rounded shadow hidden">
        <h2 class="text-lg font-semibold mb-4">Editar Usuario</h2>
        <form id="edit-user-form" method="post">
          <div class="mb-4">
            <label for="user_id" class="block text-gray-700">ID</label>
            <input type="text" id="edit-id" name="user-id" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="name" class="block text-gray-700">Nombre</label>
            <input type="text" id="edit-name" name="name" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="lastname" class="block text-gray-700">Apellido</label>
            <input type="text" id="edit-lastname" name="lastname" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="edit-email" name="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="user_type" class="block text-gray-700">Tipo de Usuario</label>
            <select name="user_type" id="edit-user-type" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
              <option value="">-- Seleccione --</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
          <div class="mb-4">
            <label for="password" class="block text-gray-700">Contraseña</label>
            <input type="password" id="edit-password" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="confirmar-clave" class="block text-gray-700">Confirmar Contraseña</label>
            <input type="password" id='edit-password-confirm' name="confirmar-clave" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
        </form>

      </div>
      <!-- Lado izquierdo: Formulario -->
      <div id="users_add_form" class="w-1/2 p-4 bg-white rounded shadow">
      <h2 class="text-2xl font-semibold mb-4">Agregar Usuario</h2>
        <form action="../Backend/UserController.php" method="POST">
          <div class="mb-4">
            <label for="name" class="block text-gray-700">Nombre</label>
            <input type="text" id="add-name" name="name" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="lastname" class="block text-gray-700">Apellido</label>
            <input type="text" id="add-lastname" name="lastname" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="add-email" name="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="user_type" class="block text-gray-700">Tipo de Usuario</label>
            <select name="user_type" id="add-user-type" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
              <option value="">-- Seleccione --</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
          <div class="mb-4">
            <label for="password" class="block text-gray-700">Contraseña</label>
            <input type="password" id="add-password" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="confirmar-clave" class="block text-gray-700">Confirmar Contraseña</label>
            <input type="password" id='add-password-confirm' name="confirmar-clave" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none">Registrarse</button>
        </form>
      </div>
      <!-- Lado derecho: Tabla -->
      <div id="users-table"  class="w-1/2 p-4 ml-4 bg-white rounded shadow flex flex-col justify-between ">
        <div>
          <h2 class="text-lg font-semibold mb-4">Lista de Usuarios</h2>
          <table class="w-full">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Tipo de Usuario</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <!--Se insertan los datos desde la base de datos-->
            </tbody>
          </table>
        </div>
        
        <button id="btn_add_user" class="bg-red-500 text-white px-4 py-2 w-48 rounded hover:bg-red-600">Nuevo Usuario</button>
      </div>
    </div>
  </div>
  </div>
  <script type="module" src="../Backend/js/AdminUserJS.js"> </script>
</body>
</html>