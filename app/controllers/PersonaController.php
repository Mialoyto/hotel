<?php
require_once APP_PATH . 'models/Person.php';

class PersonaController extends Controller
{

  private $personModel;
  public function __construct()
  {
    $this->personModel = new Persona();
  }

  /**
   *  MUESTRA LA VISTA DEL FORMULARIO DE REGISTRO DE PERSONAS
   */
  public function viewAddPerson()
  {
    $this->view('person/addPerson');
  }

  /**
   * REGISTRAR UNA NUEVA PERSONA
   * Este método espera recibir una solicitud POST con un cuerpo JSON 
   * que contenga los datos de la persona a registrar.
   * Valida los datos recibidos, y luego utiliza el modelo Persona para insertar la nueva
   */
  public function registrarPersona()
  {
    // Iniciar sesión si no está iniciada
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  // Preparar respuesta JSON
    $json = [
      "status" => false,
      "message" => "",
      "code" => 400
    ];
    // 
    header('Content-Type: application/json');

    try {
      // 1. Obtener datos JSON del cuerpo de la solicitud
      $data = $this->getJsonInput();

      if(!$data){
        http_response_code(400);
        $json['message'] = "No se recibieron datos JSON válidos";
        echo json_encode($json);
        return;
      }

      // 2. Extraer parametros del json
      $dni = $data['dni'] ?? null;
      $nombres = $data['nombres'] ?? null;
      $apellido_paterno = $data['apellido_paterno'] ?? null;
      $apellido_materno = $data['apellido_materno'] ?? null;
      $telefono = $data['telefono'] ?? null;
      $email = $data['email'] ?? null;

      // 3. Validar datos de la persona
      $validationResult = $this->validatePersonData($dni, $nombres, $apellido_paterno, $apellido_materno);
      
      if (!$validationResult['status']) {
        http_response_code(400);
        echo json_encode($validationResult);
        return;
      }

      // 4. Preparar datos para registrar persona
       $personData = [
        'dni' => trim(string: $dni),
        'nombres' =>trim($nombres),
        'apellido_paterno' => trim($apellido_paterno),
        'apellido_materno' => trim($apellido_materno),
        'telefono' => trim($telefono),
        'email' => trim($email)
      ];

      // 5. Registrar persona usando el modelo
       $result = $this->personModel->addPerson($personData);

      if($result['status']){
        http_response_code(200);
        $json['status'] = true;
        $json['message'] = $result['message'];
        $json['code'] = 200;
      } else {
        http_response_code(400);
        $json['status'] = false;
        $json['message'] = $result['message'];
        $json['code'] = 400;
      }

      echo json_encode($json);


    } catch (Exception $e) {
      http_response_code(500);
      $json['status'] = false;
      $json['message'] = "Error al procesar la solicitud: " . $e->getMessage();
      echo json_encode($json);
    }
  }

  /**
   * Obtener datos JSON del cuerpo de la solicitud
   */
  public function getJsonInput(): ?array
  {
    $rawInput = file_get_contents('php://input');
    $data = json_decode($rawInput, true);
    return is_array($data) ? $data : null;
  }

  /**
   * Verificar que se hayan recibido los campos requeridos
   */
  public function hasRequiredData($dni, $nombres, $apellido_paterno, $apellido_materno): bool
  {
    return !empty($dni) && !empty($nombres) && !empty($apellido_paterno) && !empty($apellido_materno);
  }

  /**
   * Validar datos de la persona
   */
  public function validatePersonData($dni, $nombres, $apellido_paterno, $apellido_materno)
  {
    $json = [
      "status" => false,
      "message" => "",
    ];
    $requireData = $this->hasRequiredData($dni, $nombres, $apellido_paterno, $apellido_materno);
    // valia que se hayan recibido los campos requeridos
    if (!$requireData) {
      http_response_code(400);
      $json['message'] = "Faltan campos requeridos: dni, nombres, apellido_paterno, apellido_materno";
      return $json;
    }
    // validar formato del DNI (solo números y longitud 8)
    if (!preg_match('/^\d{8}$/', $dni)) {
      http_response_code(400);
      $json['message'] = "El DNI debe contener exactamente 8 dígitos numéricos";
      return $json;
    }

    $json['status'] = true;
    $json['message'] = "Validacion exitosa";

    return $json;
  }
}
