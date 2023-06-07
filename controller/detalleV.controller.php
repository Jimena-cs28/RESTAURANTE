<?php
require_once '../model/detalleV.php';

if(isset($_POST['operacion'])){

  $deventas = new DetalleV();

  if ($_POST['operacion'] == 'listarDeVenta'){
    $datos = $deventas->ListarDeVenta($_POST['idventa']);
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
        "idcliente" => $_POST['idcliente'],
        "tipopago" => $_POST['tipopago'],
        "comprobante" => $_POST['comprobante'],
        "totalpagar" => $_POST['totalpagar']
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
      "cantidad"      => $_POST['cantidad'],
      "idmenu"       => $_POST['idmenu'],
      "total"        => $_POST['total']
    ];

    $respuesta = $deventas->registrarDe($datosGuardar);
    echo json_encode($respuesta);
  }
}