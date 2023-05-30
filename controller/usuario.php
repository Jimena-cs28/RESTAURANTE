<?php
session_start();

$_SESSION["iniciarSesion"] = [];

require_once '../model/usuario.model.php';

if (isset($_POST['operacion'])){

  //Instancia clase Usuario
  $usuario = new Usuario();

  if ($_POST['operacion'] == 'iniciarSesion'){

    $data = $usuario->iniciarSesion($_POST['usuario']);

    $acceso = [
      "status"     => false,
      "email"     => " ",
      "mensaje"  => ""
    ];
    
    if ($data){

      $claveIngresada = $data['claveacceso']; //No está encriptada
      if (password_verify($_POST['clave'],$claveIngresada)){      
        //Registrar datos de acceso
        $acceso["status"] = true;
        $acceso["email"] = $data["nombreusu"];
      }else{
        $acceso["mensaje"] = "Error en la contraseña";
      }
    }else{
      $acceso["mensaje"] = "Usuario no encontrado";
    }

    $_SESSION["iniciarSesion"] = $acceso;
    //Enviar el objeto $acceso a la vista
    echo json_encode($acceso);

  } //Fin operacion = iniciarSesion
}

if (isset($_GET['operacion']) == 'destroy'){
  session_destroy();
  session_unset();
  header("location:../");
}

?>