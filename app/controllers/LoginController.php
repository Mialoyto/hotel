<?php
// PASO 5: hotel/app/controllers/LoginController.php (CONTROLADOR DE LOGIN)

/* EL CONTROLADOR DE LOGIN SE ENCARGA DE MOSTRAR EL FORMULARIO DE LOGIN Y PROCESAR EL LOGIN DEL USUARIO
CREAMOS LA CLASE LoginController QUE HEREDA DE LA CLASE BASE Controller 
(QUE SE ENCUENTRA EN app/core/Controller.php) */
require_once APP_PATH . 'models/Login.php';

//  ini_set('display_errors', 1);
// error_reporting(E_ALL);

class LoginController extends Controller
{
  private $userLogin;
  public function __construct()
  {
    // CARGAMOS EL MODELO DE LOGIN
    $this->userLogin = new Login();
  }

  // METODO PARA MOSTRAR LA VISTA DE LOGIN
  public function index()
  {
    $this->view('login/index');
  }

  // METODO PARA CERRAR LA SESIÓN DEL USUARIO
  public function logout()
  {

    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
    // LIBERAMOS LA SESIÓN
    session_unset();
    // ELIMINAMOS LA SESIÓN DEL USUARIO
    session_destroy();
    // REDIRECCIONAMOS AL LOGIN
    header('Location: ' . BASE_URL . '/login');
  }

  // METODO PARA PROCESAR EL LOGIN DEL USUARIO
  public function auth()
  {

    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    header('Content-type: application/json');
    $json = [
      'status' => false,
      'message' => '',
    ];


    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
      $json['status'] = false;
      $json['message'] = 'Todos los campos son obligatorios';
      $response = json_encode($json);
      echo $response;
      return;
    } else {
      // CONSULTAMOS A LA BASE DE DATOS SI EL USUARIO EXISTE
      $datos = $this->userLogin->authLogin(
        ['usuario' => $username]
      );


      // contamos la cantidad de datos obtenidos, si es menor a 1, significa que el usuario no existe
      if (empty($datos)) {
        $json['status'] = false;
        $json['message'] = 'Usuario no encontrado';
        $response = json_encode($json);
        echo $response;
        return;
      } else {

        // si el usuario existe, verifiwcamos la contraseña
        $claveEncriptada = $datos['password'];

        if (password_verify($password, $claveEncriptada)) {
          $_SESSION['user'] = $datos['nombres'] . ' ' . $datos['apellido_paterno'] . ' ' . $datos['apellido_materno'];
          $_SESSION['rol_user'] = $datos['nombre_rol'];
          $_SESSION['hotel_user'] = $datos['nombre_hotel'];
          $_SESSION['id_hotel'] = $datos['id_hotel'];
          $json['status'] = true;
          $json['message'] = 'Login exitoso';
          $json['redirect'] = '/home';
          // $json['data'] = $datos;
          $response = json_encode($json);
          echo $response;
          return;
        } else {
          $json['status'] = false;
          $json['message'] = 'Contraseña incorrecta';
          $response = json_encode($json);
          echo $response;
          return;
        }
      }
    }
  }
}