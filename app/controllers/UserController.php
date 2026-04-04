<?php

require_once APP_PATH . 'models/User.php';
/* PARA QUE  FUNCIONE  COMO API, DEBEMOS DEVOLVER RESPUESTAS EN JSON, NO VISTAS 
O HTML, POR LO QUE NO USAREMOS $this->view() EN ESTE CONTROLADOR, SINO QUE 
DEVOLVEREMOS RESPUESTAS JSON DIRECTAMENTE DESDE LOS MÉTODOS.  */


class UserController extends Controller
{
  private $userModel;

  public function __construct()
  {
    // CARGAMOS EL MODELO DE USUARIOS
    $this->userModel = new User();
  }
  public function viewListUser()
  {
    $this->view('users/getUser');
  }

  // METODO PARA MOSTRAR LA VISTA DE USUARIOS
  public function getUsers()
  {
    if(session_status() === PHP_SESSION_NONE){
      session_start();
    }
    header('Content-Type: application/json');
    $json = [
      "status" => false,
      "message" => "",
      "data" => null
    ];
    try {
      $id_hotel = $_SESSION['user']['id_hotel'] ?? null;
      if(!$id_hotel){
        http_response_code(400);
        $json['message'] = "No se pudo obtener el hotel del usuario";
        echo json_encode($json);
        return;
      }

      // OBTENEMOS LOS USUARIOS DEL HOTEL
      $users = $this->userModel->getUsers($id_hotel);
      $json['status'] = true;
      $json['message'] = "Usuarios obtenidos correctamente";  
      $json['data'] = $users;
      echo json_encode($json);
    } catch (Exception $e) {
      http_response_code(500);
      $json['message'] = "Error al obtener los usuarios: " . $e->getMessage();
      echo json_encode($json);
    }
  }
}
