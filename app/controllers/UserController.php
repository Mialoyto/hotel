<?php

require_once APP_PATH . 'models/User.php';

class UserController extends Controller
{
  private $userModel;

  public function __construct()
  {
    // CARGAMOS EL MODELO DE USUARIOS
    $this->userModel = new User();
  }

  // METODO PARA MOSTRAR LA VISTA DE USUARIOS
  public function getUsers() {

    $id_hotel = $_SESSION['id_hotel'] ?? null;

    // OBTENEMOS LOS USUARIOS DEL HOTEL
    $users = $this->userModel->getUsers($id_hotel);

    // MOSTRAMOS LA VISTA DE USUARIOS PASANDO LOS DATOS OBTENIDOS
    $this->view('users/getUser', ['users' => $users]);
  }
}


// $userController = new UserController();
// $userController->getUsers();