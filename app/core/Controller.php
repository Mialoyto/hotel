<?php

class Controller {

    protected function view($path, $data = []){

        extract($data);

        require APP_PATH . 'views/' . $path . '.php';
    }

    protected function redirect($url){

        header("Location: /hotel/" . $url);
        exit;
    }
}