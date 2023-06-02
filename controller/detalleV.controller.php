<?php
require_once '../model/detalleV.php';

if(isset($_POST['operacion'])){

  $deventas = new DetalleV();

  if ($_POST['operacion'] == 'listarDeVenta'){
    $datos = $deventas->ListarDeVenta();
    if ($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'eliminar'){
    $respuesta = $deventas->eliminar($_POST['idventa']);
    echo json_encode($respuesta);
  }

  if($_POST['operacion'] == 'actualizar'){
    $datosActulizar = [
        "idventa" => $_POST['idventa'],
        "idturno" => $_POST['idturno'],
        "idmesa" => $_POST['idmesa'],
        "idTplato" => $_POST['idTplato'],
        "plato" => $_POST['plato'],
        "PrecioUni" => $_POST['PrecioUni']
    ];

    $respuesta = $deventas->actualizar($datosActulizar);
    echo json_encode($respuesta);
  }
}