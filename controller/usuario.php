<?php
require_once '../model/usuario.model.php';

if (isset($_GET['operacion'])){

  //Instancia clase Usuario
  $usuario = new Usuario();

  if ($_GET['operacion'] == 'iniciarSesion'){

    $acceso = [
      "login"       => false,
      "email"       => " ",
      "claveacceso" =>  " "
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

    //Enviar el objeto $acceso a la vista
    echo json_encode($acceso);

  } //Fin operacion = iniciarSesion

}
?>