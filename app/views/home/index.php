<?php
// require_once dirname(__DIR__) . '/config/config.php';
require_once APP_PATH . 'views/layouts/header.php';
?>





<h1 class="text-3xl font-bold text-center mt-8 text-white">Bienvenido <?= $_SESSION['hotel_user'] ?></h1>
<!-- <a href="<?= BASE_URL ?>/logout" class="block text-center mt-4 text-blue-500 hover:underline">Cerrar Sesión</a> -->
<!-- <a  class="block text-center mt-4 text-blue-500 hover:underline">Habitaciones</a> -->
<main class="flex-1 flex items-center justify-center p-8 sm:p-8">
   <!-- <p class="text-white ">contenido principal</p> -->
</main>

</body>

<?php
// CARGAMOS EL FOOTER
require_once APP_PATH . 'views/layouts/footer.php';
?>



</html>