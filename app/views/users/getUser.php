<?php require_once APP_PATH . 'views/layouts/header.php';
// ini_set('display_errors', value: 1)
?>

<main class="flex flex-1 flex-col px-3 sm:px-2">
  <div class="px-2 sm:px-8">
    <div class="bg-white rounded-2xl shadow-2xl">

      <!-- HEADER -->
      <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 p-3 px-2 border-b">
        <h2 class="text-lg font-semibold text-gray-800 gap-4">Usuarios</h2>

        <button id="btn-pdf" class="bg-gray-200 p-2 sm:p-px rounded-lg
              hover:bg-emerald-300 shadow transition">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF" class="fill-emerald-600">
            <path d="M360-460h40v-80h40q17 0 28.5-11.5T480-580v-40q0-17-11.5-28.5T440-660h-80v200Zm40-120v-40h40v40h-40Zm120 120h80q17 0 28.5-11.5T640-500v-120q0-17-11.5-28.5T600-660h-80v200Zm40-40v-120h40v120h-40Zm120 40h40v-80h40v-40h-40v-40h40v-40h-80v200ZM320-240q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z" />
          </svg>
        </button>

        <input
          id="search"
          placeholder="Buscar usuario..."
          class="w-full sm:w-64 px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
      </header>

      <!-- TABLA -->
      <main class="overflow-x-auto py-4 px-2 sm:py-4">
        <div id="tb-users" class="">
          <!-- carga los datos desde la base de datos -->
        </div>
      </main>

    </div>
  </div>
</main>

<?php require_once APP_PATH . 'views/layouts/footer.php'; ?>
<script src="<?= BASE_URL ?>/assets/js/users/getUsers.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>

</html>