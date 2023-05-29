<?php
require_once '../model/usuario.model.php';

if(isset($_POST['operacion'])){

    $usuario = new Usuario();

    if($_POST['operacion'] == 'iniciarSesion'){
        $acceso = [
            "login"       => false,
            "apellidos"   => "",
            "nombres"     => ""
        ];
      
        $data = $usuario->iniciarSesion($_POST['email']);
        $claveIngresada = $_POST['password']; //No está encriptada
      
        if ($data){
            if (password_verify($claveIngresada, $data["claveacceso"])){        
                //Registrar datos de acceso
                $acceso["login"] = true;
                $acceso["apellidos"] = $data["apellidos"];
                $acceso["nombres"] = $data["nombres"];
            }else{
                $acceso["mensaje"] = "Error en la contraseña";
            }
        }else{
            $acceso["mensaje"] = "Usuario no encontrado";
        }
      
        //Enviar el objeto $acceso a la vista
        echo json_encode($acceso);
    }
}