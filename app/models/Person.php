<?php
require_once 'Conexion.php';
class Persona extends Conexion
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = $this->getConexion();
  }

  public function addPerson($params = []): array
  {
    try {
      $stmt = 'CALL sp_insertar_persona(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
      $cmd = $this->pdo->prepare($stmt);
      $cmd->execute(
        array(
          $params['id_hotel'],
          $params['nombres'],
          $params['apellido_paterno'],
          $params['apellido_materno'],
          $params['dni'],
          $params['fecha_nacimiento'],
          $params['ubigeo'],
          $params['direccion'],
          $params['telefono'],
          $params['email']
        )
      );
      return [
        'status' => true,
        'message' => 'Persona registrada exitosamente',
      ];
    } catch (PDOException $e) {
      if ($e->getCode() === '45000') {
        // Extraer solo el mensaje de error personalizado
        $errorMessage = $this->extractErrorMessage($e->getMessage());
        return [
          'status' => false,
          'message' => $errorMessage //retorna: "El DNI ya está registrado"
        ];
      } else {
        return [
          'status' => false,
          'message' => 'Error al registrar persona'
        ];
      }
    }
  }

  private function extractErrorMessage($fullMessage)
  {
    // Busca el patrón: número + mensaje
    // "... 1644 El DNI ya está registrado"
    if (preg_match('/\d+\s+(.+)$/', $fullMessage, $matches)) {
      return $matches[1];  // Devuelve: "El DNI ya está registrado"
    }
    return $fullMessage; // Fallback si no encuentra el patrón
  }
}
