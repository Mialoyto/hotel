<?php

// CLASE CONEXION
class Conexion{
    private $server = 'localhost';
    private $puerto = '3306';
    private $bd = 'db_hotel';
    private $usuario = 'root';
    private $password = '';
    
    // ABRIR LA CONEXION
    public function getConexion(){
        try{
            $pdo = new PDO(
                "mysql:host={$this->server};
                port={$this->puerto};
                dbname={$this->bd};
                charset=utf8mb4",
                $this->usuario,
                $this->password
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // ECHO "Conexion exitosa";
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
            
        }
    }


// CERRAR LA CONEXION
    public function closeConexion(){
        
    }

}

// $CONEXION = new Conexion();
// $CONEXION->getConexion();