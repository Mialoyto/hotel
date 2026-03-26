<?php require_once APP_PATH . 'views/layouts/header.php'; ?>
<main>
    <h1 class="text-3xl font-bold text-center mt-8 text-white">Reservas</h1>
    <p class="text-center mt-4 text-white">Aquí podrás ver tus reservas y gestionarlas.</p>
    <div class="flex justify-center mt-8">
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Número de Habitación</
                            <th class="py-2 px-4 border-b">Fecha de Entrada</th>
                    <th class="py-2 px-4 border-b">Fecha de Salida</
                            <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b">101</td>
                    <td class="py-2 px-4 border-b">2024-07-01</td>
                    <td class="py-2 px-4 border-b">2024 -07-05</td>
                    <td class="py-2 px-4 border-b">
                        <button class="bg-red-500 text-white px-4 py-2 rounded hover    :bg-red-600">Cancelar</button>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b">202</td>
                    <td class="py-2 px-4 border-b">2024-08-10</td>
                    <td class="py-2 px-4 border-b">2024-08-15</td>
                    <td class="py-2 px-4 border-b">
                        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Cancelar</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    <div>
        <!-- icono de bed -->
        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#e3e3e3">
            <path d="M80-200v-255q0-25 10-47t30-36v-116q0-45 30.5-75.5T226-760h180q22 0 41 10t33 27q14-17 32.5-27t40.5-10h180q45 0 76 30.5t31 75.5v116q20 14 30 36t10 47v255h-60v-80H140v80H80Zm430-355h270v-99q0-20-13.5-33T733-700H550q-17 0-28.5 14T510-654v99Zm-330 0h270v-99q0-18-11.5-32T410-700H226q-19 0-32.5 13.5T180-654v99Zm-40 215h680v-115q0-17-11.5-28.5T780-495H180q-17 0-28.5 11.5T140-455v115Zm680 0H140h680Z" />
        </svg>
    </div>
</main>

<?php require_once APP_PATH . 'views/layouts/footer.php'; ?>