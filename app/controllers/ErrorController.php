<?php

class ErrorController extends Controller {

    public function error404(){
        $this->view('errors/404');
    }

    public function error500(){
        $this->view('errors/500');
    }

}


?>