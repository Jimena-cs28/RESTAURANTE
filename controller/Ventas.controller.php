<?php
require_once '../model/Ventas.model.php';

if(isset($_POST['operacion'])){

  $ventas = new Ventas();

  if ($_POST['operacion'] == 'listarVenta'){
    $datosObtenidos = $ventas->ListarVenta();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }

  if($_POST['operacion'] == 'listarturno'){
    $datos = $ventas->listarTurno();
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarPersona'){
    $datos = $ventas->listarPersona();
    if($datos){
      echo json_encode($datos);
    }
  }
  
}
