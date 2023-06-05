<?php

require_once '../model/reporte.php';

if(isset($_POST['operacion'])){
  $lista = new Listar();

  if($_POST['operacion'] == 'listarTurno'){
    
    $datos = $lista->listarTurno();
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarTPlato'){
    
    $datos = $lista->listarTPlato();
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarVenta'){

    $datos = $lista->listarVenta($_POST['turno']);
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarVenta1'){
    $datos = $lista->listarVenta1($_POST['plato']);
    if($datos){
      echo json_encode($datos);
    }
  }

}