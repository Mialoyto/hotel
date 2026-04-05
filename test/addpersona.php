<?php

require_once APP_PATH . 'controllers/PersonaController.php';


$persona = new PersonaController();
$datos = [
  'nombres' => 'Miguel',
  'apellido_paterno' => 'Loyola',
  'apellido_materno' => 'Torres',
  'dni' => '26558002',
  'telefono' => '',
  'email' => ''
];
$persona->registrarPersona($datos);