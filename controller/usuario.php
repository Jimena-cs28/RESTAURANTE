<?php
require_once '../model/usuario.model.php';

if(isset($_POST['operacion'])){

    $usuario = new Usuario();

    if($_POST['operacion'] == 'iniciarSesion'){
        $acceso = [
          "login"       => false,
          "apellidos"   => "",
          "nombres"   => "",
          "email"   => "",
        ];

        $data = $usuario->iniciarSesion($_GET['email']);
        $claveIngresada = $_GET['password']; //No está encriptada

        if ($data){
            if (password_verify($claveIngresada, $data["claveacceso"])){        
              //Registrar datos de acceso
              $acceso["login"] = true;
              $acceso["email"] = $data["email"];

            }else{
              $acceso["mensaje"] = "Error en la contraseña";
            }
          }else{
            $acceso["mensaje"] = "Usuario no encontrado";
          }
      
          //Asignar el arreglo $acceso a la variable a la sesión
          $_SESSION['seguridad'] = $acceso;
          $_SESSION['inicio'] = date('c');
          $_SESSION['navegador'] = 'Google Chrome';


        //Enviar el objeto $acceso a la vista
        echo json_encode($acceso);
    }
}