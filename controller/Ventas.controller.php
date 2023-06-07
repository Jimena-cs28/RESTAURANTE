<?php
require_once '../model/Ventas.model.php';

if(isset($_POST['operacion'])){

  $ventas = new Ventas();

  if ($_POST['operacion'] == 'listarVenta'){
    $datos = $ventas->listarventas();
    if ($datos){
      echo json_encode($datos);
    }
  }


  if($_POST['operacion'] == 'listarCliente'){
    $datos = $ventas->listarCliente();
    if($datos){
      echo json_encode($datos);
    }
  }
  
  if($_POST['operacion'] == 'registrarV'){
    $datosGuardar = [
      "idusuario"     => $_POST['idusuario'],
      "numMesa"      => $_POST['numMesa']
    ];

    $respuesta = $ventas->registrarV($datosGuardar);
    echo json_encode($respuesta);
  }

}