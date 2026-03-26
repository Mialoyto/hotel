<?php
// PASO 1: hotel/public/index.php (PUNTO DE ENTRADA DE LA APLICACIÓN)

// PARA VER LOS ERRORES EN PANTALLA DURANTE EL DESARROLLO, DESCOMENTAR LAS SIGUIENTES LÍNEAS
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
// echo "INICIO DEL INDEX.PHP";
// echo "INICIO DEL INDEX.PHP";


// 1. INICIAMOS LA SESIÓN (permite guardar información del usuario a través de diferentes páginas)
// session_start();

// 2. cargamos las configuraciones y dependencias necesarias para la aplicación
require_once '../config/config.php';

// 3. cargamos nucleo del sistema (controladores, rutas, etc)
require_once APP_PATH . 'core/Controller.php';
require_once APP_PATH . 'core/Router.php';

// 4. creamos una instancia del enrutador que se encargará de manejar las rutas de la aplicación
$router = new Router();

// 5. Cargamos archivo de rutas (definimos las rutas de la aplicación) 
require_once APP_PATH . 'routes/web.php';


// 6. Ejecutamos el enrutador para procesar la solicitud actual y mostrar la página correspondiente
$router->run();
// var_dump($_GET);
// // echo "</br>";
// // var_dump($_POST);
// exit;

// 7 . Para depuración, podemos imprimir el arreglo $_GET para ver los parámetros de la URL (descomentar si es necesario)
// echo "<pre>";
// print_r($_GET);
// exit;