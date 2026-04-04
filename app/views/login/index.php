<?php
// ini_set('display_errors', value: 1)k
;
// error_reporting(E_ALL);
require_once APP_PATH . 'views/layouts/header-login.php';
?>

<!-- alerts -->
 <div id="alert-container" class="fixed top-5 right-5 space-y-2 z-50"></div>
 <!-- fin de alerts -->
      <Main class="flex-1 flex items-center justify-center p-8 sm:p-8">
    <div class="bg-white rounded-lg p-8 sm:p-8 w-full max-w-md shadow-lg ">
      <h2 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h2>
      <form method="POST" id="loginForm" class="space-y-4">
        <div>
          <label for="username" class="block text-sm font-medium text-gray-700">Usuario</label>
          <input type="text" name="username" id="username"  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
          <input type="password" name="password" id="password"  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Ingresar</button>
        </div>
      </form>

    </div>
      </Main>
<?php require_once APP_PATH . 'views/layouts/footer-login.php'; ?>

<script src="<?= BASE_URL ?>/assets/js/login.js"></script>
<script src="<?= BASE_URL ?>/assets/js/config.js"></script>
<script src="<?= BASE_URL ?>/assets/js/helpers/Alerts.js"></script>
</html>
