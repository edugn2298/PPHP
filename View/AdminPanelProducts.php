
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
  <!--Header-->
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
      <li><a href="<?php echo $APP_URL ?> ./View/AdminPanelLogOut.php" class="block p-4  hover:bg-gray-700 ">Cerrar sesión</a>
      </li>
    </ul>
  </nav>
  <!--Header-->
  <!--Container Principal-->
  <div class="container mx-auto p-4">
    <div class="flex">
      <!-- Lado izquierdo: Formulario -->
      <!--Formulario para agregar productos-->
      <div id='form_div_add_product' class="w-1/2 p-4 bg-white rounded shadow">
        <h2 class="text-lg font-semibold mb-4">Agregar Producto</h2>
        <form id="add-product-form" method="post" enctype="multipart/form-data" >
          <div class="mb-4">
            <label for="nombre" class="block font-medium">Nombre:</label>
            <input type="text" id="add-name" name="nombre" class="w-full border rounded p-2">
          </div>
          <div class="mb-4">
            <label for="precio" class="block font-medium">Precio:</label>
            <input type="number" id="add-price" name="precio" class="w-full border rounded p-2">
          </div>
          <div class="mb-4">
            <label for="descripcion" class="block font-medium">Descripción:</label>
            <textarea id="add-description" name="add-description" rows="4" class="w-full border rounded p-2"></textarea>
          </div>
          <div class="mb-4">
            <label for="imagen" class="block font-medium">Imagen:</label>
            <input type="file" id="add-image" name="imagen" class="w-full">
          </div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
        </form>
      </div>
      <!--Formulario para agregar productos-->
      <!--Formulario para editar productos-->
      <div id='form_div_edit_product' class="w-1/2 p-4 bg-white rounded shadow hidden">
        <h2 class="text-lg font-semibold mb-4">Editar Producto</h2>
        <form id="edit-product-form" method="post" enctype="multipart/form-data" >
          <div class="mb-4">
            <label for="edit-id" class="block font-medium" >ID:</label>
            <input type="text" id="edit-id" name="id" class="w-full border rounded p-2" readonly>
          </div>
          <div class="mb-4">
            <label for="nombre" class="block font-medium">Nombre:</label>
            <input type="text" id="edit-name" name="nombre" class="w-full border rounded p-2">
          </div>
          <div class="mb-4">
            <label for="precio" class="block font-medium">Precio:</label>
            <input type="number" id="edit-price" name="precio" class="w-full border rounded p-2">
          </div>
          <div class="mb-4">
            <label for="descripcion" class="block font-medium">Descripción:</label>
            <textarea id="edit-description" name="add-description" rows="4" class="w-full border rounded p-2"></textarea>
          </div>
          <div class="mb-4">
            <label for="imagen" class="block font-medium">Imagen:</label>
            <input type="file" id="edit-image" name="imagen" class="w-full">
          </div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
        </form>
      </div>
      <!--Formulario para editar productos-->
      <!-- Lado derecho: Tabla -->
      <div class="w-1/2 p-4 ml-4 bg-white rounded shadow flex flex-col justify-between">
        <div id="products-table" class=" ">
          <h2 class="text-lg font-semibold mb-4">Lista de Productos</h2>
          <table class="w-full">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
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
                  <button class="btn-edit-product text-blue-500 hover:underline mr-2">Editar</button>
                  <button class="btn-delete-product text-red-500 hover:underline">Eliminar</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <button id="btn_add_product" class="bg-red-500 text-white px-4 py-2 w-48 rounded hover:bg-red-600">Nuevo Producto</button>
      </div>   


    </div>
  </div>
  </table>
  </div>
<!--Container Principal-->
<script type="module" src="../Backend/js/AdminProducts.js"> </script>
</body>
</html>
