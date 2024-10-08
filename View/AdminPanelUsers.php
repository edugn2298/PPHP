
<?php
  $APP_URL = 'http://localhost/PPHP'; 
  session_start();
  if (!isset($_SESSION['user_type'])) {
    header("Location:" . $APP_URL . "/View/UserLogin.php"); 
  } else if ($_SESSION['user_type'] != 'admin') {
    header("Location:" . $APP_URL . "./Index.php"); 
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once "./head.php" ?> 
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
      </ul>
  </nav>

  <div class="container mx-auto p-4">
    <div class="flex">
      <!-- Lado izquierdo: Formulario -->
      <div class="w-1/2 p-4 bg-white rounded shadow">
        <h2 class="text-lg font-semibold mb-4">Agregar Usuario</h2>
        <form action="guardar_usuario.php" method="post">
          <div class="mb-4">
            <label for="nombre" class="block font-medium">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="w-full border rounded p-2">
          </div>
          <div class="mb-4">
            <label for="apellido" class="block font-medium">Apellido:</label>
            <input type="text" id="apellido" name="apellido" class="w-full border rounded p-2">
          </div>
          <div class="mb-4">
            <label for="correo" class="block font-medium">Correo:</label>
            <input type="email" id="correo" name="correo" class="w-full border rounded p-2">
          </div>
          <div class="mb-4">
            <label for="tipo_usuario" class="block font-medium">Tipo de Usuario:</label>
            <select id="tipo_usuario" name="tipo_usuario" class="w-full border rounded p-2">
              <option value="admin">Administrador</option>
              <option value="regular">Regular</option>
            </select>
          </div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
        </form>
      </div>

      <!-- Lado derecho: Tabla -->
      <div id="users-table"  class="w-1/2 p-4 ml-4 bg-white rounded shadow">
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
            <!--
            <?php foreach ($users as $user): ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['name'] ?></td>
              <td><?= $user['surname'] ?></td>
              <td><?= $user['email'] ?></td>
              <td><?= $user['user_type'] ?></td>
              <td>
                <button class="text-blue-500 hover:underline mr-2">Editar</button>
                <button class="text-red-500 hover:underline">Eliminar</button>
              </td>
            </tr>
            <?php endforeach; ?>-->
            <tr>
              <td>1</td>
              <td>John</td>
              <td>Doe</td>
              <td>john@example.com</td>
              <td>Admin</td>
              <td>
                <button class="text-blue-500 hover:underline mr-2">Editar</button>
                <button class="text-red-500 hover:underline">Eliminar</button>
              </td>
            </tr>
            <!-- Repite para otros usuarios -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
  <script src="../Backend/js/AdminUserJS.js"> </script>
</body>
</html>