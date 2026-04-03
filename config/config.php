<?php
// PASO 2: hotel/config/config.php (CONFIGURACIÓN DE LA APLICACIÓN)

// 1. URL base del navegador (para generar enlaces y redirecciones)
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
// echo "Scheme: " . $scheme . "\n";
// echo '<br>';
// echo "Host: " . $host . "\n";
// echo '<br>';
// echo $_SERVER['HTTP_HOST'];
// echo '<br>';
define('BASE_URL', $scheme . '://' . $host . '/hotel/public');
// echo "BASE_URL: " . BASE_URL . "\n";
/* BASE_URL: http://localhost/hotel/public/ 
BASE_URL es para el NAVEGADOR, es la URL base de la aplicación, se usa para generar enlaces y redirecciones. 
*/

// 2. RUTA ABSOLUTA DEL PROYECTO EN EL SERVIDOR (para incluir archivos y acceder a recursos del servidor)
define('ROOT_PATH', dirname(__DIR__));
/* ROOT_PATH: /opt/lampp/htdocs/hotel 
ROOt_PATH es para el SERVIDOR, es la ruta absoluta al directorio raíz de la aplicación en el sistema de archivos, 
se usa para incluir archivos y acceder a recursos del servidor. 
*/

// 3. RUTA DE LA CARPETA APP (para organizar el código fuente de la aplicación)
define('APP_PATH', ROOT_PATH . '/app/');
/* APP_PATH: /opt/lampp/htdocs/hotel/app/  
APP_PATH es la ruta absoluta al directorio de la aplicación, se usa para organizar el código 
fuente de la aplicación, como controladores, modelos, vistas, etc.
*/