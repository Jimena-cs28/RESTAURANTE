<?php
session_start();

$_SESSION["login"] = [];

require_once '../model/usuario.model.php';

if (isset($_POST['operacion'])){

  //Instancia clase Usuario
  $usuario = new Usuario();

  if ($_POST['operacion'] == 'iniciarSesion'){
    $acceso = [
      "status"     => false,
      "apellidos"  => "",
      "nombres"   => "",
      "mensaje"  => ""
    ];

    $data = $usuario->iniciarSesion($_POST['nombreusu']);
    $claveIngresada = $_POST['claveacceso'];

    if ($data){
      if (password_verify($claveIngresada, $data['claveacceso'])){      
        //Registrar datos de acceso
        $acceso["status"] = true;
        $acceso["apellidos"] = $data["apellidos"];
        $acceso["nombres"] = $data["nombres"];
        $acceso["mensaje"]="Bienvenida";
      }else{
        $acceso["mensaje"] = "Error en la contraseña";
      }
    }else{
      $acceso["mensaje"] = "Usuario no encontrado";
    }

    $_SESSION['login'] = $acceso;
    
    //Enviar el objeto $acceso a la vista

    echo json_encode($acceso);

  } //Fin operacion = iniciarSesion
}

if (isset($_GET['operacion']) == 'destroy'){
session_destroy();
session_unset();
header("location:../login.php");
}

?>