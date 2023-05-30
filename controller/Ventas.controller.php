<?php
require_once '../model/Ventas.model.php';

if(isset($_POST['operacion'])){

  $ventas = new Ventas();

  if ($_POST['operacion'] == 'listarVenta'){
    $data = $ventas->ListarVenta();
    if ($data){
      foreach($data as $registro){
        echo "
            <tr>
                <td>{$registro['iddeventa']}</td>
                <td>{$registro['turno']}</td>
                <td>{$registro['Mesa']}</td>
                <td>{$registro['tipo']}</td>
                <td>{$registro['nombres']}</td>
                <td>{$registro['apellidos']}</td>
                <td>{$registro['PrecioUni']}</td>
                <td>{$registro['plato']}</td>
                <td>{$registro['cantidad']}</td>
                <td>{$registro['precioTotal']}</td>
                <td>{$registro['Tipopago']}</td>
            </tr>
        ";
      }
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
