<?php

class RoomsController extends Controller {

    public function index(){
        // CARGAMOS LA VISTA DE HABITACIONES
        $this->view('rooms/index');
        
    }

    public function reservas(){
        // CARGAMOS LA VISTA DE RESERVAS
        $this->view('rooms/reservas/reservas');
    }

}