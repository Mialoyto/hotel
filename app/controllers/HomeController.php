<?php
// PASO 7: hotel/app/controllers/HomeController.php (CONTROLADOR DE HOME)

class HomeController extends Controller {

    // MÉTODO PARA MOSTRAR LA VISTA DE HOME
    public function index(){
       /*   ESTE MÉTODO SE EJECUTA CUANDO EL USUARIO ACCEDE A LA RUTA /home, 
            QUE REQUIERE AUTENTICACIÓN (MIDDLEWARE DE LOGIN)
            SI EL USUARIO ESTÁ AUTENTICADO, SE MOSTRARÁ LA VISTA DE HOME, 
            SI NO LO ESTÁ, EL MIDDLEWARE LO REDIRECCIONARÁ AL LOGIN */
        $this->view('home/index');
    }
}