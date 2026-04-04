<?php require_once APP_PATH . 'views/layouts/header.php';
// ini_set('display_errors', value: 1)
?>
<div id="alert-container" class="fixed top-5 right-5 space-y-2 z-50">

</div>
<main class="flex flex-1 justify-center items-start">

  <!-- <div class="flex justify-end bg-gray-800 rounded-lg px-4 py-2 mb-4 p-2">
  <span class="text-sm text-white">Modulo/Persona</span>
</div> -->
  <form action="" method="POST" class="bg-gray-800 rounded-lg  p-px sm:p-8 lg:p-6">
    <div class="flex flex-col gap-4 p-8">
      <header>
        <div class="flex flex-col items-start">
          <h2 class="text-2xl font-semibold text-white font-mono">Registrar Persona</h2>
        </div>
      </header>
      <main class="">
        <div class="flex flex-col gap-4 sm:grid sm:grid-cols-2  sm:gap-6">

          <div class="flex flex-col">
            <label for="dni" class="text-sm text-white font-mono">DNI</label>
            <div class="flex items-center">
              <input type="text" id="dni" name="dni" class="px-3 py-2 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
              <button id="btnBuscarDni" class="px-3 py-2 rounded-r-lg bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 transition cursor-pointer" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                  <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                </svg>
              </button>
            </div>
          </div>

          <div class=" flex flex-col">
            <label for="nombre" class="text-sm text-white font-mono">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
          </div>

          <div class="flex flex-col">
            <label for="apellidoPaterno" class="text-sm text-white font-mono">Apellido Paterno</label>
            <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
          </div>

          <div class="flex flex-col">
            <label for="apellidoMaterno" class="text-sm text-white font-mono">Apellido Materno</label>
            <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
          </div>

          <div class="flex flex-col">
            <label for="fechaNacimiento" class="text-sm text-white font-mono">Fecha de Nacimiento</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white w-full">
          </div>

          <div class="flex flex-col">
            <label for="telefono" class="text-sm text-white font-mono">Telefono</label>
            <input type="text" id="telefono" name="telefono" class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
          </div>

          <div class="col-span-2">
            <div class="flex flex-col">
              <label for="correo" class="text-sm text-white font-mono">Correo Electronico</label>
              <input type="email" id="correo" name="correo" class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
            </div>
          </div>

        </div>
      </main>
      <footer class="flex flex-col w-full mt-4">
        <button type="submit" class="flex flex-col bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition cursor-pointer">
          <span class="font-mono">Registrar</span>
        </button>
      </footer>
    </div>
  </form>

</main>
<?php require_once APP_PATH . 'views/layouts/footer.php'; ?>
<script src="<?= BASE_URL ?>/assets/js/person/addPerson.js"></script>
<script src="<?= BASE_URL ?>/assets/js/helpers/Alerts.js"></script>

</html>