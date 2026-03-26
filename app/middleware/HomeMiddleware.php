<?php

class HomeMiddleware {
    public function index(){

        // MOSTRAMOS LA VISTA DE HOME
        require APP_PATH . 'views/home/index.php';
    }
}