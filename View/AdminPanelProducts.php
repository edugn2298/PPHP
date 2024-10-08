
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
      <li><a href="<?php echo $APP_URL ?> ./View/AdminPanelHome.php" class="block p-4 hover:bg-gray-700">Dashboard</a>
      </li>
      <li><a href="<?php echo $APP_URL ?> ./View/AdminPanelProducts.php"
          class="block p-4 hover:bg-gray-700">Productos</a></li>
      <li><a href="<?php echo $APP_URL ?> ./View/AdminPanelUsers.php" class="block p-4 hover:bg-gray-700">Usuarios</a>
      </li>
    </ul>
  </nav>

  <div class="container mx-auto p-4">
    <div class="flex">
      <!-- Lado izquierdo: Formulario -->
      <div class="w-1/2 p-4 bg-white rounded shadow">
        <h2 class="text-lg font-semibold mb-4">Agregar Producto</h2>
        <form action="guardar_producto.php" method="post" enctype="multipart/form-data">
          <div class="mb-4">
            <label for="nombre" class="block font-medium">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="w-full border rounded p-2">
          </div>
          <div class="mb-4">
            <label for="precio" class="block font-medium">Precio:</label>
            <input type="number" id="precio" name="precio" class="w-full border rounded p-2">
          </div>
          <div class="mb-4">
            <label for="descripcion" class="block font-medium">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" class="w-full border rounded p-2"></textarea>
          </div>
          <div class="mb-4">
            <label for="imagen" class="block font-medium">Imagen:</label>
            <input type="file" id="imagen" name="imagen" class="w-full">
          </div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
        </form>
      </div>
      <!-- Lado derecho: Tabla -->
      <div class="w-1/2 p-4 ml-4 bg-white rounded shadow">
        <h2 class="text-lg font-semibold mb-4">Lista de Productos</h2>
        <table class="w-full">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Precio</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Producto 1</td>
              <td>Descripción del producto 1</td>
              <td>$100.00</td>
              <td>
                <button class="text-blue-500 hover:underline mr-2">Editar</button>
                <button class="text-red-500 hover:underline">Eliminar</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  </table>

</div>

</body>
</html>
