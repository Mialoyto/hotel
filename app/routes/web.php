<?php
// PASO 5: hotel/app/routes/web.php (DEFINICIÓN DE RUTAS)

// RUTA RAÍZ: al entrar a /public mostramos el login
// !ERROR ORIGINAL: esta ruta faltaba (o no coincidía) y por eso /hotel/public terminaba en 404.
// !El Router convierte /hotel/public en '/', así que esta definición es obligatoria.

// TODO: MODULO DE LOGIN Y AUTENTICACIÓN (CON SESIONES)
$router->get('/', 'LoginController@index');
// RUTA LOGIN (SIN MIDDLEWARE, PARA MOSTRAR EL FORMULARIO DE LOGIN)
// DEVUELVE LA VISTA HTML
$router->get('/login', 'LoginController@index');
// LOGIN API (SIN MIDDLEWARE, PARA PROBAR EL LOGIN DESDE POSTMAN O FRONTEND)
$router->post('/login', 'LoginController@auth');
// LOGOUT API (CON MIDDLEWARE DE AUTENTICACIÓN, PARA CERRAR SESIÓN SOLO A USUARIOS AUTENTICADOS)
$router->get('/logout', 'LoginController@logout', 'LoginMiddleware');


// TODO: MODULO DE DASHBOARD O HOME (CON SESIONES)
// RUTA HOME (CON MIDDLEWARE DE AUTENTICACIÓN, PARA MOSTRAR HOME SOLO A USUARIOS AUTENTICADOS)
$router->get('/home', 'HomeController@index', 'LoginMiddleware');


// TODO: MODULO DE HABITACIONES (CON SESIONES)
// RUTA DE PRUEBA PARA MOSTRAR LAS HABITACIONES (CON MIDDLEWARE DE AUTENTICACIÓN)
$router->get('/rooms', 'RoomsController@index', 'LoginMiddleware');
$router->get('/rooms/reservas', 'RoomsController@reservas', 'LoginMiddleware'); // RUTA DE PRUEBA PARA MOSTRAR LAS HABITACIONES (CON MIDDLEWARE PERSONALIZADO)



// TODO: MODULO DE USUARIOS (CON SESIONES)
// MUESTRA LA VISTA DE GESTION DE USUARIOS (CON MIDDLEWARE DE AUTENTICACIÓN)
$router->get('/users/getUser', 'UserController@viewListUser', 'LoginMiddleware');
// CARGA LOS USUARIOS EN FORMATO JSON (CON MIDDLEWARE DE AUTENTICACIÓN)
$router->get('/users/getUser/data', 'UserController@getUsers', 'LoginMiddleware');

// TODO: MODULO DE PERSONAS (CON SESIONES)
// SOLA LA VISTA HTML DE REGISTRO DE PERSONAS (CON MIDDLEWARE DE AUTENTICACIÓN)
$router->get('/persona', 'PersonaController@viewAddPerson', 'LoginMiddleware');
// RUTA PARA REGISTRAR PERSONAS (CON MIDDLEWARE DE AUTENTICACIÓN)
$router->post('/persona/registrar', 'PersonaController@registrarPersona', 'LoginMiddleware'); // RUTA PARA REGISTRAR PERSONAS (CON MIDDLEWARE DE AUTENTICACIÓN)

// TODO: CONSUMIR API DE DNI
// RUTA PARA OBTENER INFO DE DNI (SIN MIDDLEWARE, PARA PROBAR DESDE POSTMAN O FRONTEND)
$router->get('/persona/dni', 'ApiDniController@getDniInfo','LoginMiddleware'); 








































// RUTA LOGOUT (CON MIDDLEWARE DE AUTENTICACIÓN, PARA CERRAR SESIÓN SOLO A USUARIOS AUTENTICADOS)
// $router->get('/logout', 'LoginController@logout', 'LoginMiddleware');

// !PRUEBAS DE LOGIN CON API (SIN MIDDLEWARE, PARA PROBAR EL LOGIN DESDE POSTMAN O FRONTEND)


// USERS API (PROTEGIDO)
// $router->get('/users', 'ApiUserController@getUsers', 'ApiAuthMiddleware');