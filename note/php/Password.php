<?php
$password = "admin";
echo "Contraseña sin encriptar: " . $password . "<br>";
// ENCRIPTAR LA CONTRASEÑA
$password_encrypted = password_hash($password, PASSWORD_BCRYPT);
echo "Contraseña encriptada: " . $password_encrypted . "<br>";
// VERIFICAR LA CONTRASEÑA
$password_verify = password_verify($password, $password_encrypted);
if($password_verify){
    echo "Contraseña verificada correctamente";
} else {
    echo "Contraseña incorrecta";
}
// VERSION DE PHP
echo "Versión de PHP: " . phpversion();