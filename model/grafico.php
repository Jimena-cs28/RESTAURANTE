<?php
require_once 'conexion.php';


class Grafico extends Conexion{

    private $conexion;

    public function __CONSTRUCT(){
        $this->conexion = parent::getConexion();
    }

    public function Grafico1(){
        try{
            $consulta = $this->conexion->prepare("CALL spu_listarGrafico()");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
      
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
