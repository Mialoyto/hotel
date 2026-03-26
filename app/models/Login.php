<?php 
require_once 'Conexion.php';
class Login extends Conexion{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConexion();
    }

    public function authLogin($params = []):array
    {
        try{
            $stmt = 'CALL sp_usuario_login(?)';
            $cmd = $this->pdo->prepare($stmt);
            $cmd->execute(
                array(
                    $params['usuario']
                )
            );
            $response = $cmd->fetch(PDO::FETCH_ASSOC);
            if($response === false){
                return [];
            }else{
                return $response;
            }

        }catch(PDOException $e){
            return [];
        }
    }
}

