<?php
require_once '../model/Ventas.model.php';

if(isset($_POST['operacion'])){

  $ventas = new Ventas();

  if ($_POST['operacion'] == 'listarVenta'){
    $datos = $ventas->ListarVenta();
    if ($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarturno'){
    $datos = $ventas->listarTurno();
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarMesa'){
    $datos = $ventas->listarMesa();
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarCliente'){
    $datos = $ventas->listarCliente();
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarPago'){
    $datos = $ventas->listarPago();
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarAdmi'){
    $datos = $ventas->listarAdmi();
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarPlato'){
    $datos = $ventas->listarPlato();
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarCompro'){
    $datos = $ventas->listarCompro();
    if($datos){
      echo json_encode($datos);
    }
  }
  
  if($_POST['operacion'] == 'registrarV'){
    $datosGuardar = [
      "idturno"     => $_POST['idturno'],
      "idadmi"      => $_POST['idadmi'],
      "idmesa"      => $_POST['idmesa'],
      "idTplato"    => $_POST['idTplato'],
      "plato"       => $_POST['plato']
    ];

    $respuesta = $ventas->registrarV($datosGuardar);
    echo json_encode($respuesta);
  }
}