<?php

class ApiDniController extends Controller
{
    public function getDniInfo()
    {
        header('Content-Type: application/json');
        require_once APP_PATH . 'api/apiDni.php';
    }
}