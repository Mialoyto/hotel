<?php
/* 
- PASO 1 :  hotel/public/index.php (PUNTO DE ENTRADA)
- PASO 2 :  hotel/config/config.php (CONFIGURACIÓN DE LA APLICACIÓN)
- PASO 3 :  hotel/app/core/Router.php (ENRUTADOR CON SOPORTE PARA MIDDLEWARES)
- paso 4 :  hotel/app/middleware/LoginMiddleware.php (MIDDLEWARE DE AUTENTICACIÓN)
- PASO 5 :  hotel/app/routes/web.php (DEFINICIÓN DE RUTAS)
- PASO 6 :  hotel/app/controllers/LoginController.php (CONTROLADOR DE LOGIN) 
            posible error: el controlador de login no se ha mostrado en los pasos anteriores, 
            pero es necesario para el funcionamiento del sistema de autenticación.
- PASO 7 :  hotel/app/controllers/HomeController.php (CONTROLADOR DE HOME)
- PASO 8 :  hotel/app/views/login/index.php (VISTA DE LOGIN)
            hotel/app/views/home/index.php (VISTA DE HOME)
- PASO 9 :  hotel/public/assets/js/login.js


FLUJO DE LA APLICACIÓN:
1. El usuario accede a la URL raíz (http://localhost/practica-php/hotel/public/)
2. El Router detecta que la ruta es '/' y el método es GET, por lo que ejecuta el controlador LoginController y su método index()
3. El método index() del LoginController carga la vista de login (app/views/login/index.php)
4. El usuario ingresa su usuario y contraseña y envía el formulario
5. El Router detecta que la ruta es '/login' y el método es POST, por lo que ejecuta el controlador LoginController y su método auth()
6. El método auth() del LoginController verifica las credenciales del usuario
7. Si las credenciales son correctas, se guarda el usuario en la sesión y se retorna una respuesta JSON con el estado 'success' y la URL de redirección a '/home'
8. El archivo login.js recibe la respuesta JSON y redirige al usuario a la página de inicio (http://localhost/practica-php/hotel/public/home)
9. El Router detecta que la ruta es '/home' y el método es GET, por lo que ejecuta el controlador HomeController y su método index()
10. El método index() del HomeController carga la vista de home (app/views/home/index.php) y muestra un mensaje de bienvenida al usuario autenticado.

Usuario (Browser)
        │
        ▼
public/index.php
        │
        ▼
Router
        │
        ▼
¿La ruta tiene Middleware?
        │
   ┌────┴────┐
   │         │
   ▼         ▼
Ejecutar     Ir directo
Middleware   al Controller
   │
   ▼
¿Permiso válido?
   │
 ┌─┴─┐
 │   │
 ▼   ▼
Sí   No
 │   │
 ▼   ▼
Controller   Redirección (login)
 │
 ▼
View / JSON
 │
 ▼
Respuesta al navegador


IMPORTANTE
FLUJO CUANNDO SE DESARROLLA
1. CREAR RUTAS 
    routes/web.php

    ejemplo:
    $router->get('/reservas', 'ReservaController@index', 'AuthMiddleware');
    $router->post('/reservas', 'ReservaController@store', 'AuthMiddleware');

    | Método | URL       | Acción           |
    | ------ | --------- | ---------------- |
    | GET    | /reservas | mostrar reservas |
    | POST   | /reservas | guardar reserva  |

2. CREAR CONTROLADORES
    app/controllers/ReservaController.php

    ejemplo:
    <?php

    class ReservaController{

        // Mostrar lista de reservas
        public function index(){

            require "../views/reservas/index.php";

        }

        // Guardar reserva
        public function store(){

            $cliente = $_POST['cliente'];
            $habitacion = $_POST['habitacion'];

            echo json_encode([
                "status" => "success"
            ]);

        }

    }

3. MIDDLEWARE (SI ES PRIVADO, SI LA PAGINA SOLO PUEDE VERLA UN USUARIO LOGUEADO)
    app/middleware/ReservaMiddleware.php

    ruta:
    $router->get('/reservas', 'ReservaController@index', 'AuthMiddleware');

    ejemplo:
    <?php

    class AuthMiddleware{

        public function handle(){

            session_start();

            if(!isset($_SESSION['user'])){
                header('Location: ' . BASE_URL . '/login');
                exit();
            }
        }

    }

4. VISTAS (CREAR LAS VISTAS)
    app/views/reservas/index.php

    ejemplo:
    <?php
    require_once '../views/layouts/header.php';
    ?>

    <h1>Lista de Reservas</h1>

    <?php
    require_once '../views/layouts/footer.php';
    ?>

5. CREAR EL JAVASCRIPT (SI ES NECESARIO)
    public/assets/js/reservas.js

    ejemplo:
    document.getElementById('reservaForm').addEventListener('submit', function(e){
        e.preventDefault();

        const cliente = document.getElementById('cliente').value;
        const habitacion = document.getElementById('habitacion').value;

        fetch('/reservas', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `cliente=${cliente}&habitacion=${habitacion}`
        })
        .then(response => response.json())
        .then(data => {
            if(data.status === 'success'){
                alert('Reserva guardada');
            }
        });
    });

6. CONECTAR LA BASE DE DATOS (SI ES NECESARIO)
    app/core/Database.php

    ejemplo:
    <?php

    class Database {

        private $host = 'localhost';
        private $db = 'hotel';
        private $user = 'root';
        private $pass = '';
        private $conn;

        public function connect(){
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conn;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                return null;
            }
        }

    }   

7. PROBAR LA APLICACIÓN
    - Acceder a la URL de la aplicación (http://localhost/practica-php/hotel/public/)
    - Probar el login con las credenciales correctas (admin/admin)
    - Verificar que se redirige a la página de inicio y muestra el mensaje de bienvenida
    - Probar el login con credenciales incorrectas y verificar que muestra un mensaje de error
    - Probar acceder a la página de inicio sin estar autenticado y verificar que redirige al login


----------------------------------------------------------------------------------------------------------
FLUJO MENTAL DE UN DESARROLLADOR
¿Qué URL necesito?
        ↓
Creo la ruta
        ↓
Creo el controller
        ↓
Protejo con middleware
        ↓
Creo la vista
        ↓
Agrego JS
        ↓
Conecto BD
        ↓
Pruebo

NOTA : NUNCA EMPEZAR POR HTML, 
- SIEMPRE EMPEZAR POR LA RUTA, 
- LUEGO EL CONTROLADOR, 
- MIDDLEWARE, 
- VISTA, 
- JS, 
- BD,
- RUEBAS. 
SI SE EMPIEZA POR HTML, SE PIERDE EL FOCO EN LA LÓGICA DE LA APLICACIÓN Y SE TERMINA HACIENDO UN DESASTRE. 
SI SE SIGUE EL FLUJO MENTAL CORRECTO, SE GARANTIZA UNA ESTRUCTURA LIMPIA Y ORDENADA EN EL PROYECTO.

*/