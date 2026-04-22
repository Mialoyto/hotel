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

      if (!$data) {
        http_response_code(400);
        $json['message'] = "No se recibieron datos JSON válidos";
        echo json_encode($json);
        return;
      }

      // 2. Extraer parametros del json
      $dni = $this->limpiarVacios($data['dni']);
      $nombres = $this->limpiarVacios($data['nombres']);
      $apellido_paterno = $this->limpiarVacios($data['apellido_paterno']);
      $apellido_materno = $this->limpiarVacios($data['apellido_materno']);
      $ubigeo = $this->limpiarVacios($data['ubigeo']);
      $fecha_nacimiento = $data['fecha_nacimiento']; // No se aplica limpiarVacios a fechas
      $direccion = $this->limpiarVacios($data['direccion']) ?? null;
      $telefono = $this->limpiarVacios($data['telefono']) ?? null;
      $email = $this->limpiarVacios($data['email']) ?? null;

      // 3. Validar datos de la persona
      $validationResult = $this->validatePersonData($dni, $nombres, $apellido_paterno, $apellido_materno, $ubigeo, $fecha_nacimiento);

      if (!$validationResult['status']) {
        http_response_code(400);
        echo json_encode($validationResult);
        return;
      }

      // 4. Preparar datos para registrar persona
      $personData = [
        'id_hotel' => $_SESSION['user']['id_hotel'], // Agregar el id_hotel desde la sesión
        'dni' => trim(string: $dni),
        'nombres' => trim($nombres),
        'apellido_paterno' => trim($apellido_paterno),
        'apellido_materno' => trim($apellido_materno),
        'fecha_nacimiento' => $fecha_nacimiento, // No se aplica trim a fechas
        'ubigeo' => trim($ubigeo),
        'direccion' => trim($direccion),
        'telefono' => trim($telefono),
        'email' => trim($email),
      ];

      // 5. Registrar persona usando el modelo
      $result = $this->personModel->addPerson($personData);

      if ($result['status']) {
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
  public function hasRequiredData($dni, $nombres, $apellido_paterno, $apellido_materno, $ubigeo, $fecha_nacimiento)
  {
    $json = [
      "status" => false,
      "message" => "",
    ];

    if (empty($dni)) {
      $json['message'] = "El campo DNI es obligatorio";
      return $json;
    }
    if (empty($nombres)) {
      $json['message'] = "El campo Nombres es obligatorio";
      return $json;
    }
    if (empty($apellido_paterno)) {
      $json['message'] = "El campo Apellido Paterno es obligatorio";
      return $json;
    }
    if (empty($apellido_materno)) {
      $json['message'] = "El campo Apellido Materno es obligatorio";
      return $json;
    }
    if (empty($ubigeo)) {
      $json['message'] = "El campo Ubigeo es obligatorio";
      return $json;
    }
    if (empty($fecha_nacimiento)) {
      $json['message'] = "El campo Fecha de Nacimiento es obligatorio";
      return $json;
    }
    
    $validateDate = $this->validateDate($fecha_nacimiento);
    if(!$validateDate['status']){
      $json['message'] = $validateDate['message'];
      return $json;
    }
    $json['status'] = true;
    return $json;
  }

  /**
   * Validar datos de la persona
   */
  public function validatePersonData($dni, $nombres, $apellido_paterno, $apellido_materno, $ubigeo, $fecha_nacimiento)
  {
    $json = [
      "status" => false,
      "message" => "",
    ];
    $requireData = $this->hasRequiredData($dni, $nombres, $apellido_paterno, $apellido_materno, $ubigeo, $fecha_nacimiento);
    // valia que se hayan recibido los campos requeridos
    if (!$requireData['status']) {
      http_response_code(400);
      $json['message'] = $requireData['message'];
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

  /**
   * Limpiar datos vacíos convirtiéndolos a null
   */
  public function limpiarVacios($valor)
  {
    return $valor === "" ? null : $valor;
  }

  public function validateDate($fecha)
  {
    $json = [
      "status" => false,
      "message" => "",
    ];

    try{
      $fechaIngresada = new DateTime($fecha);
      $fechaIngresada->setTime(0, 0, 0); // Establecer la hora a 00:00:00 para comparar solo fechas
      
      $fechaActual = new DateTime();
      $fechaActual->setTime(0, 0, 0); // Establecer la hora a 00:00:00 para comparar solo fechas

      if ($fechaIngresada > $fechaActual) {
        $json['message'] = "La fecha de nacimiento no puede ser mayor a la fecha actual";
        return $json;
      }
      $json['status'] = true;
      $json['message'] = "Fecha de nacimiento válida";
      return $json;

    } catch (Exception $e){
      $json['message'] = "Error al procesar la fecha: " . $e->getMessage();
      return $json;
    }
  }
}
