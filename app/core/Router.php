<?php
// PASO 3: hotel/app/core/Router.php (ENRUTADOR CON SOPORTE PARA MIDDLEWARES)
class Router {

    // AQUI GUARDAMOS TODAS LAS RUTAS DEFINIDAS EN LA APLICACIÓN
    private $routes = [];

    // MÉTODO PARA DEFINIR UNA RUTA GET
    // $uri: la ruta (ejemplo: /login)
    // $action: la acción a ejecutar (ejemplo: LoginController@index)
    // $middleware: el middleware a aplicar (ejemplo: AuthMiddleware)

    public function get($uri, $controller, $middleware = null){
        $this->routes['GET'][$uri] = [
            'controller' => $controller,
            'middleware' => $middleware
        ];
    }

    // MÉTODO PARA DEFINIR UNA RUTA POST
    public function post($uri, $controller, $middleware = null){
        $this->routes['POST'][$uri] = [
            'controller' => $controller,
            'middleware' => $middleware
        ];
    }

    // METODO PRINCIPAL QUE EJECUTA LA RUTA
    public function run(){

        // METODO ACTUAL (GET o POST)
        $method = $_SERVER['REQUEST_METHOD'];

        // RUTA ACTUAL
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Construimos la base desde BASE_URL para no depender de una carpeta fija.
        // Ejemplo: BASE_URL = http://localhost/hotel/public -> basePath = /hotel/public
        $basePath = rtrim(parse_url(BASE_URL, PHP_URL_PATH), '/');

        // Solo quitamos el prefijo cuando la URL realmente empieza con la base.
        // Evita reemplazos accidentales en otras partes de la ruta.
        if ($basePath !== '' && strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }
        // echo "URI después de quitar base: $uri <br>";

        // NORMALIZAMOS LA RUTA PARA QUE /public Y /public/ APUNTEN A '/'
        // ?IMPORTANTE: cuando entras a /hotel/public, esta línea deja la ruta como '/'.
        // Si en app/routes/web.php no existe $router->get('/', ...), se dispara el 404.
        $uri = '/' . trim($uri, '/');
        // echo "Método: $method, Ruta: $uri <br>";

        
        // SI EXISTE LA RUTA REGISTRADA PARA EL METODO ACTUAL, LA EJECUTAMOS
        if(isset($this->routes[$method][$uri])){

            // EJEMPLO: LoginController@index
            $route = $this->routes[$method][$uri];

            // EJECUTAMOS EL MIDDLEWARE SI EXISTE
            if($route['middleware']){
                // CARGAMOS EL ARCHIVO DEL MIDDLEWARE
                require_once APP_PATH . 'middleware/' . $route['middleware'] . '.php';

                // CREAMOS UNA INSTANCIA DEL MIDDLEWARE 
                $middleware = new $route['middleware']();
                // EJECUTAMOS EL MÉTODO HANDLE DEL MIDDLEWARE
                $middleware->handle();
            }

            // $action: LoginController@index
            $action = $route['controller'];

            // SEPARAMOS EL CONTROLADOR Y EL MÉTODO
             list($controllerName, $methodName) = explode('@', $action);
            //  list($controllerName, $methodName)
                /*  1. list() : es una función de PHP que asigna valores a variables a partir de un array.
                    En este caso, explode('@', $action) devuelve un array con dos elementos:
                    - El primer elemento es el nombre del controlador (LoginController)
                    - El segundo elemento es el nombre del método (index)
                    Luego, list() asigna estos valores a las variables $controllerName y $methodName 
                    respectivamente, para que podamos usarlas posteriormente para cargar el controlador 
                    y ejecutar el método correspondiente.   
                    
                    2. explode('@', $action) : es una función de PHP que divide una cadena en partes utilizando un delimitador.
                    En este caso, el delimitador es '@', y la cadena es $action (por ejemplo: LoginController@index).
                    La función devuelve un array con dos elementos:
                    - El primer elemento es la parte antes del '@' (LoginController)
                    - El segundo elemento es la parte después del '@' (index)
                    Este array se utiliza para asignar el controlador y el método que se deben ejecutar para la ruta actual.    
                */

            // CARGAMOS EL ARCHIVO DEL CONTROLADOR
            require_once APP_PATH . 'controllers/' . $controllerName . '.php';

            // CREAMOS OBJETO DEL CONTROLADOR
            $controller = new $controllerName();

            // EJECUTAMOS EL MÉTODO DEL CONTROLADOR
            $controller->$methodName();
            // echo "Método: $method, Ruta: $uri <br>";
            // exit;

            // RETORNAMOS PARA EVITAR SEGUIR EJECUTANDO EL CÓDIGo Y MOSTRAR ERROR 404
            return;
        }

        // SI NO EXISTE LA RUTA, MOSTRAMOS ERROR 404
        http_response_code(404);
        echo "Archivo no encontrado: app/core/Router.php";
    }
}

// $serve = new Router();
// echo $serve->run();