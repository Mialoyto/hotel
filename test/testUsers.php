<?php
require_once '../config/config.php';
require_once APP_PATH . 'models/User.php';

$usuarios = new User();
$response = $usuarios->getUsers(1);
echo json_encode($response);