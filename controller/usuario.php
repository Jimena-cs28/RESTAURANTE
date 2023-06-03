<?php
session_start();


require_once '../model/usuario.model.php';

if (isset($_POST['operacion'])){

  //Instancia clase Usuario
  $usuario = new Usuario();

  if ($_POST['operacion'] == 'iniciarSesion'){
    $acceso = [
      "login"     => false,
      "apellidos"  => " ",
      "nombres"   => "",
      "mensaje"  => ""
    ];

    $data = $usuario->iniciarSesion($_GET['nombreusu']);
    $claveIngresada = $_GET['h'];
    
    if ($data){
      if (password_verify($claveIngresada, $data['claveacceso'])){      
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

    $_SESSION['seguridad'] = $acceso;
    $_SESSION['inicio'] = date('c');
    $_SESSION['navegador'] = '';
    
    //Enviar el objeto $acceso a la vista

    echo json_encode($acceso);

  } //Fin operacion = iniciarSesion
}

// if (isset($_GET['operacion']) == 'destroy'){
//   session_destroy();
//   session_unset();
//   header("location:../");
// }

?>