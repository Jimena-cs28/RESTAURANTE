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
        "idTplato" => $_POST['idTplato'],
        "numMesa" => $_POST['numMesa'],
        "plato" => $_POST['plato']
    ];

    $respuesta = $deventas->actualizar($datosActulizar);
    echo json_encode($respuesta);
  }

  if($_POST['operacion'] == 'obtener'){
    $respuesta = $deventas->obtener($_POST['idventa']);
    echo json_encode($respuesta);
  }

  if($_POST['operacion'] == 'registrarDE'){
    $datosGuardar = [
      "idventa"         => $_POST['idventa'],
      "idclientes"      => $_POST['idclientes'],
      "PrecioUni"       => $_POST['PrecioUni'],
      "cantidad"        => $_POST['cantidad'],
      "precioTotal"     => $_POST['precioTotal'],
      "idtipopago"         => $_POST['idtipopago'],
      "idcomprobante"     => $_POST['idcomprobante']
    ];

    $respuesta = $deventas->registrarDe($datosGuardar);
    echo json_encode($respuesta);
  }
}