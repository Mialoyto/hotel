<?php
// PASO 4: hotel/app/middleware/LoginMiddleware.php (MIDDLEWARE DE AUTENTICACIÓN)
class LoginMiddleware {

    public function handle(){
        session_start();
        // SI NO EXISTE LA SESIÓN DE USUARIO
        if(!isset($_SESSION['user'])){

            // REDIRECCIONAMOS AL LOGIN
            header('Location: ' . BASE_URL . '/login');
            exit();
        }else{
            // SI EXISTE LA SESIÓN DE USUARIO, PERMITIMOS EL ACCESO A LA RUTA
            return true;
        }
    }


}

/* QUE HACE ESTE MIDDLEWARE: VERIFICA SI EL USUARIO ESTÁ AUTENTICADO 
(SI EXISTE LA SESIÓN DE USUARIO), SI NO LO ESTÁ, LO REDIRECCIONA AL LOGIN. 
ESTE MIDDLEWARE SE APLICA A LAS RUTAS QUE REQUIEREN AUTENTICACIÓN, COMO EL DASHBOARD. */