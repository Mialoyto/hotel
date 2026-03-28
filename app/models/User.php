<?php
require_once 'Conexion.php';
class User extends Conexion
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConexion();
    }

    public function getUsers($id_hotel): array
    {
        try {
            $stmt = 'CALL sp_get_usuarios_roles(?)';
            $cmd = $this->pdo->prepare($stmt);
            $cmd->execute(
              [$id_hotel]
            );
            $response = $cmd->fetchAll(PDO::FETCH_ASSOC);
            if ($response === false) {
                return [];
            } else {
                return $response;
            }
        } catch (PDOException $e) {
            return [];
        }
    }
}

