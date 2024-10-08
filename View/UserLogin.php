<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once "./head.php" ?>
</head>
<body class="ba-gray-100 flex flex-col justify-between h-screen">
  <?php require_once "./header.php" ?>
  <div class="flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Iniciar Sesión</h2>
        <form action="../Backend/UserController.php" method="post">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="clave" class="block text-gray-700">Contraseña</label>
                <input type="password" id="clave" name="clave" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex items-center justify-between">
              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none">Ingresar</button>
              <p class="text-sm">  No tienes cuenta? <a href="UserRegister.php" class="text-blue-500 hover:underline">Registrarse</a></p>
            </div>
        </form>
    </div>
  </div>
  <?php require_once "./footer.php" ?>
</body>