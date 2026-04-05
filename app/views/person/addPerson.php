<?php require_once APP_PATH . 'views/layouts/header.php';
// ini_set('display_errors', value: 1)
?>
<div id="alert-container" class="fixed top-5 right-5 space-y-2 z-50">
<!-- alertas -->
</div>
<main class="flex flex-1 justify-center items-start">
  <form id="formPersona" method="POST" class="bg-gray-800 rounded-lg p-8 px-8 sm:p-2 lg:p-6">
    <div class="flex flex-col gap-4 sm:px-4 px-6">
      <header>
        <div class="flex flex-col items-start">
          <h2 class="text-2xl font-semibold text-white font-mono">Registrar Persona</h2>
        </div>
      </header>
      <main class="sm:px-4 lg:px-6 w-full">
        <div class="flex flex-col gap-4 sm:grid sm:grid-cols-2  sm:gap-6">

          <div class="flex flex-col">
            <label for="dni" class="text-sm text-white font-mono">DNI</label>
            <div class="flex items-center">
              <input type="text"  id="dni" inputmode="numeric" name="dni" pattern="[0-9]{8}" class="px-3 py-2 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white w-full" maxlength="8">
              <button id="btnBuscarDni" class="px-3 py-2 rounded-r-lg bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 transition cursor-pointer" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                  <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                </svg>
              </button>
            </div>
          </div>

          <div class=" flex flex-col">
            <label for="nombre" class="text-sm text-white font-mono">Nombre</label>
            <input type="text" id="nombre" name="nombre" disabled class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
          </div>

          <div class="flex flex-col">
            <label for="apellidoPaterno" class="text-sm text-white font-mono">Apellido Paterno</label>
            <input type="text" id="apellidoPaterno" name="apellidoPaterno" disabled class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
          </div>

          <div class="flex flex-col">
            <label for="apellidoMaterno" class="text-sm text-white font-mono">Apellido Materno</label>
            <input type="text" id="apellidoMaterno" name="apellidoMaterno" disabled class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
          </div>

          <div class="flex flex-col">
            <label for="fechaNacimiento" class="text-sm text-white font-mono">Fecha de Nacimiento</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white w-full">
          </div>

          <div class="flex flex-col">
            <label for="telefono" class="text-sm text-white font-mono">Telefono</label>
            <input type="text" id="telefono" name="telefono" class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
          </div>
          <div class="col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="flex flex-col">
              <label for="departamento" class="text-sm text-white font-mono">Departamento</label>
              <select name="departamento" id="departamento" disabled class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
                <option value="">Seleccionar Departamento</option>
              </select>
            </div>
            <div class="flex flex-col">
              <label for="provincia" class="text-sm text-white font-mono">Provincia</label>
              <select name="provincia" id="provincia" disabled class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white" >
                <option value="">Seleccionar Provincia</option>
              </select>
            </div>
            <div class="flex flex-col">
              <label for="distrito" class="text-sm text-white font-mono">Distrito</label>
              <select name="distrito" id="distrito" disabled class="px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white" >
                <option value="">Seleccionar Distrito</option>
              </select>
            </div>
          </div>
          <div class="col-span-2">
            <div class="flex flex-col">
              <label for="direccion" class="text-sm text-white font-mono">Direccion</label>
              <input type="text" id="direccion" name="direccion" disabled class="w-full min-w-0 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
            </div>
          </div>
          <div class="col-span-2">
            <div class="flex flex-col">
              <label for="correo" class="text-sm text-white font-mono">Correo Electronico</label>
              <input type="email" id="correo" name="correo" class="w-full min-w-0 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
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
<script type="module" src="<?= BASE_URL ?>/assets/js/person/addPerson.js"></script>
<script src="<?= BASE_URL ?>/assets/js/helpers/Alerts.js"></script>

</html>