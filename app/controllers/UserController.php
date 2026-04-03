<?php

require_once APP_PATH . 'models/User.php';
// header('Content-Type: application/json');

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
    try {
      $id_hotel = $_SESSION['id_hotel'] ?? null;

      // OBTENEMOS LOS USUARIOS DEL HOTEL
      $users = $this->userModel->getUsers($id_hotel);

      // MOSTRAMOS LA VISTA DE USUARIOS PASANDO LOS DATOS OBTENIDOS
      // $this->view('users/getUser', ['users' => $users]);
      header('Content-Type: application/json');
      echo json_encode($users);
    } catch (Exception $e) {
      echo json_encode(value: ['error' => $e->getMessage()]);
    }
  }
}
