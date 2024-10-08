<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once "./head.php" ?>
</head>
<body class="ba-gray-100 flex flex-col justify-between h-screen">
  <?php require_once "./header.php" ?>
  <div class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
      <h2 class="text-2xl font-semibold mb-4">Registro</h2>
        <form action="../Backend/UserController.php" method="POST">
          <div class="mb-4">
            <label for="name" class="block text-gray-700">Nombre</label>
            <input type="text" name="name" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="lastname" class="block text-gray-700">Apellido</label>
            <input type="text" name="lastname" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="user_type" class="block text-gray-700">Tipo de Usuario</label>
            <select name="user_type" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
              <option value="">-- Seleccione --</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
          <div class="mb-4">
            <label for="password" class="block text-gray-700">Contraseña</label>
            <input type="password" id="clave" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <div class="mb-4">
            <label for="confirmar-clave" class="block text-gray-700">Confirmar Contraseña</label>
            <input type="password" name="confirmar-clave" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
          </div>
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none">Registrarse</button>
        </form>
    </div>
  </div>

  <?php require_once "./footer.php" ?>
</body>
</html>