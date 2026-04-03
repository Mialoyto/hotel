<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href='<?= BASE_URL ?>/assets/img/login.png'>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- para cargar tablas -->
    <link href="https://unpkg.com/tabulator-tables@5.5.0/dist/css/tabulator_modern.min.css" rel="stylesheet">
    <script src="https://unpkg.com/tabulator-tables@5.5.0/dist/js/tabulator.min.js"></script>
    <!-- necesario para descargar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
</head>

<body class="min-h-screen flex flex-col bg-gradient-to-br from-slate-900 to-slate-900 ">
    <!-- HEADER BOTONES -->
    <div class='flex flex-row items-center justify-between p-4'>
        <!-- PANEL BOTON DE HAMBURGUESA -->
        <a id="btn-hamburger" alt="Menú">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#e3e3e3">
                <path d="M120-240v-66.67h720V-240H120Zm0-206.67v-66.66h720v66.66H120Zm0-206.66V-720h720v66.67H120Z" />
            </svg>
        </a>
        <!-- FIN BTN DE HAMBURGUESA -->

        <!-- DATA USER -->
        <div class="flex flex-row items-center ">
            <span class="text-white text-md font-bold mr-1"><?= $_SESSION['user'] ?? '' ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#e3e3e3">
                <path d="M226-262q59-42.33 121.33-65.5 62.34-23.17 132.67-23.17 70.33 0 133 23.17T734.67-262q41-49.67 59.83-103.67T813.33-480q0-141-96.16-237.17Q621-813.33 480-813.33t-237.17 96.16Q146.67-621 146.67-480q0 60.33 19.16 114.33Q185-311.67 226-262Zm155.83-224.5Q342-526.33 342-584.67q0-58.33 39.83-98.16 39.84-39.84 98.17-39.84t98.17 39.84Q618-643 618-584.67q0 58.34-39.83 98.17-39.84 39.83-98.17 39.83t-98.17-39.83ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-155.67 31.5-72.66 85.83-127Q251.67-817 324.67-848.5T480-880q83 0 155.67 31.5 72.66 31.5 127 85.83 54.33 54.34 85.83 127Q880-563 880-480q0 82.33-31.5 155.33-31.5 73-85.83 127.34-54.34 54.33-127 85.83Q563-80 480-80Zm105-82.5q50.67-15.83 97.67-52.17-47-33.66-98-51.5Q533.67-284 480-284t-104.67 17.83q-51 17.84-98 51.5 47 36.34 97.67 52.17 50.67 15.83 105 15.83t105-15.83Zm-53.67-370.83q20-20 20-51.34 0-31.33-20-51.33T480-656q-31.33 0-51.33 20t-20 51.33q0 31.34 20 51.34 20 20 51.33 20t51.33-20ZM480-584.67Zm0 369.34Z" />
            </svg>

        </div>
        <!-- FIN DATA USER -->
    </div>
    <!-- FIN HEADER BOTONES -->

    <!-- PANEL LATERAL -->
    <div id="sidebar" class="fixed top-0 left-[-260px] w-64 h-full bg-gray-800 text-white flex flex-col transition-all duration-300 z-50">
        <header class="p-4 border-b border-gray-700">
            <div class="flex flex-row items-center justify-between mb-2">
                <div>
                    <h2 class="text-xl font-bold">Menú</h2>
                </div>
                <div id="btn-close-menu">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#e3e3e3">
                            <path d="m332-285.33 148-148 148 148L674.67-332l-148-148 148-148L628-674.67l-148 148-148-148L285.33-628l148 148-148 148L332-285.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- ROL DE USUARIO -->
            <div class="border-t border-gray-700">
                <div class="flex flex-row items-center gap-2 mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3">
                        <path d="M287-527q-47-47-47-113t47-113q47-47 113-47t113 47q47 47 47 113t-47 113q-47 47-113 47t-113-47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm96.5-143.5Q760-287 760-320t-23.5-56.5Q713-400 680-400t-56.5 23.5Q600-353 600-320t23.5 56.5Q647-240 680-240t56.5-23.5Zm-280-320Q480-607 480-640t-23.5-56.5Q433-720 400-720t-56.5 23.5Q320-673 320-640t23.5 56.5Q367-560 400-560t56.5-23.5ZM400-640Zm12 400Z" />
                    </svg>
                    <span class="text-white text-md font-bold mr-1"><?= $_SESSION['rol_user'] ?? '' ?></span>
                </div>
            </div>
            <!-- FIN DE ROL USUARIO -->
        </header>
        <main class="p-4 flex-1 overflow-y-auto">
            <ul>
                <!-- HOME -->
                <li class="flex flex-row items-center gap-2">
                    <!-- icono home -->
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3">
                        <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
                    </svg>
                    <!-- fin icono home -->
                    <a href="<?= BASE_URL ?>/home" class="block py-2 px-1 hover:bg-slate-700 rounded">
                        <span>Inicio</span>
                    </a>
                </li>
                <!-- HABITACIONES -->
                <li class="flex flex-row items-center gap-2">
                    <!-- icono habitaciones -->
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3">
                        <path d="M40-200v-600h80v400h320v-320h320q66 0 113 47t47 113v360h-80v-120H120v120H40Zm155-275q-35-35-35-85t35-85q35-35 85-35t85 35q35 35 35 85t-35 85q-35 35-85 35t-85-35Zm325 75h320v-160q0-33-23.5-56.5T760-640H520v240ZM308.5-531.5Q320-543 320-560t-11.5-28.5Q297-600 280-600t-28.5 11.5Q240-577 240-560t11.5 28.5Q263-520 280-520t28.5-11.5ZM280-560Zm240-80v240-240Z" />
                    </svg>
                    <a href="<?= BASE_URL ?>/rooms" class="block py-2 px-1 hover:bg-slate-700 rounded">
                        <span>Habitaciones</span>
                    </a>
                </li>
                <!-- PERSONAS -->
                <li class="flex flex-col">
                    <button id="btn-person" class="flex items-center justify-between w-full py-2 px-2 hover:bg-slate-700 rounded">
                        <div class="flex items-center gap-2">
                            <!-- ICONO -->
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                                <path d="M367-527q-47-47-47-113t47-113q47-47 113-47t113 47q47 47 47 113t-47 113q-47 47-113 47t-113-47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm296.5-343.5Q560-607 560-640t-23.5-56.5Q513-720 480-720t-56.5 23.5Q400-673 400-640t23.5 56.5Q447-560 480-560t56.5-23.5ZM480-640Zm0 400Z" />
                            </svg>
                            <span>Personas</span>
                        </div>
                        <!-- icono desplegar -->
                        <svg id="arrow-person"
                            class="transition-transform duration-500"
                            xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e3e3e3">
                            <path d="M480-360 280-560h400L480-360Z" />
                        </svg>
                    </button>

                    <!-- menú desplegable -->
                    <ul id="menu-person" class="flex flex-col ml-8 mt-1 gap-1 overflow-hidden max-h-0 transition-all duration-1500">
                        <li>
                            <a href="<?= BASE_URL ?>/addPerson" class="block py-2 px-4 hover:bg-slate-600 rounded">Registrar Persona</a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>/employees" class="block py-2 px-4 hover:bg-slate-600 rounded">Empleados</a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>/clients" class="block py-2 px-4 hover:bg-slate-600 rounded">Clientes</a>
                        </li>

                    </ul>


                </li>
                <!-- FIN MENÚ PERSONAS -->
                <!-- USUARIOS -->
                <li class="flex flex-col">
                    <button id="btn-users" class="flex items-center justify-between w-full py-2 px-2 hover:bg-slate-700 rounded">
                        <div class="flex items-center gap-2">
                            <!-- icono usuarios -->
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3">
                                <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm146.5-204.5Q340-521 340-580t40.5-99.5Q421-720 480-720t99.5 40.5Q620-639 620-580t-40.5 99.5Q539-440 480-440t-99.5-40.5ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm100-95.5q47-15.5 86-44.5-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160q53 0 100-15.5ZM523-537q17-17 17-43t-17-43q-17-17-43-17t-43 17q-17 17-17 43t17 43q17 17 43 17t43-17Zm-43-43Zm0 360Z" />
                            </svg>
                            <!-- texto -->
                            <span>Usuarios</span>
                        </div>
                        <!-- icono desplegar -->
                        <svg id="arrow-users"
                            class="transition-transform duration-500"
                            xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e3e3e3">
                            <path d="M480-360 280-560h400L480-360Z" />
                        </svg>
                    </button>

                    <!-- menú desplegable -->
                    <ul id="menu-users" class="flex flex-col ml-8 mt-1 gap-1 overflow-hidden max-h-0 transition-all duration-1500">
                        <li>
                            <a href="<?= BASE_URL ?>/users/getUser" class="block py-2 px-4 hover:bg-slate-600 rounded">Gestionar Usuarios</a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>/users/create" class="block py-2 px-4 hover:bg-slate-600 rounded">Crear Usuario</a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>/users/roles" class="block py-2 px-4 hover:bg-slate-600 rounded">Gestionar Roles</a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>/users/roles/create" class="block py-2 px-4 hover:bg-slate-600 rounded">Crear Rol</a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>/users/permissions" class="block py-2 px-4 hover:bg-slate-600 rounded">Gestionar Permisos</a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>/users/permissions/create" class="block py-2 px-4 hover:bg-slate-600 rounded">Crear Permiso</a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>/users/assign" class="block py-2 px-4 hover:bg-slate-600 rounded">Asignar Roles y Permisos</a>
                        </li>
                    </ul>
                </li>
                <!-- FIN MENÚ USUARIOS -->
            </ul>
        </main>
        <footer class="p-4 border-t border-gray-700">
            <ul>
                <!-- CERRAR SESIÓN -->
                <li class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3">
                        <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                    </svg>
                    <a href="<?= BASE_URL ?>/logout" class="block py-2 text-red-400 hover:bg-red-600/20 rounded">Cerrar sesión</a>
                </li>
            </ul>
        </footer>

        <!-- FOOTER -->
    </div>
    <!-- FIN PANEL LATERAL -->