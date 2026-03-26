<?php
// PASO 5: hotel/app/routes/web.php (DEFINICIÓN DE RUTAS)

// RUTA RAÍZ: al entrar a /public mostramos el login
// !ERROR ORIGINAL: esta ruta faltaba (o no coincidía) y por eso /hotel/public terminaba en 404.
// !El Router convierte /hotel/public en '/', así que esta definición es obligatoria.
$router->get('/', 'LoginController@index');

// RUTA LOGIN (SIN MIDDLEWARE, PARA MOSTRAR EL FORMULARIO DE LOGIN)
$router->get('/login', 'LoginController@index');
$router->post('/login', 'LoginController@auth');
// $router->post('/login', 'LoginController@Login');

// RUTA HOME (CON MIDDLEWARE DE AUTENTICACIÓN, PARA MOSTRAR HOME SOLO A USUARIOS AUTENTICADOS)
$router->get('/home', 'HomeController@index', 'LoginMiddleware');

// RUTA DE PRUEBA PARA MOSTRAR LAS HABITACIONES (CON MIDDLEWARE DE AUTENTICACIÓN)
$router->get('/rooms', 'RoomsController@index', 'LoginMiddleware');
$router->get('/rooms/reservas', 'RoomsController@reservas', 'LoginMiddleware'); // RUTA DE PRUEBA PARA MOSTRAR LAS HABITACIONES (CON MIDDLEWARE PERSONALIZADO)




// RUTA LOGOUT (CON MIDDLEWARE DE AUTENTICACIÓN, PARA CERRAR SESIÓN SOLO A USUARIOS AUTENTICADOS)
$router->get('/logout', 'LoginController@logout', 'LoginMiddleware');


// ? RUTAS DE PAGINA DE ERROR (ESTAS RUTAS SE PUEDEN USAR PARA MOSTRAR PÁGINAS DE ERROR PERSONALIZADAS, COMO 404, 500, ETC.)
$router->get('/errors/404', 'ErrorController@error404');
$router->get('/errors/500', 'ErrorController@error500');

