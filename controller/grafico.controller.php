<?php

require_once '../model/grafico.php';

if(isset($_POST['operacion'])){
    $grafico =  new Grafico();

    if($_POST['operacion'] == 'grafico1'){
    
        $datos = $grafico->Grafico1();
        if($datos){
            echo json_encode($datos);
        }
    }

    if($_POST['operacion'] == 'Grafico2'){
    
        $datos = $grafico->Grafico2();
        if($datos){
            echo json_encode($datos);
        }
    }
}
