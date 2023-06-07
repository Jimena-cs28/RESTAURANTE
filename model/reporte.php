<?php

require_once 'conexion.php';

class Listar extends Conexion{
    private $conexion;

    public function __CONSTRUCT(){
        $this->conexion = parent::getConexion();
    }
      
    public function listarUsu(){
      try{
        $consulta = $this->conexion->prepare("SELECT * FROM usuarios");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
  
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function listarVenta1($turno){
      try{
        $consulta = $this->conexion->prepare("CALL reporte_turno(?)");
        $consulta->execute(array($turno));
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function listarTPlato(){
      try{
        $consulta = $this->conexion->prepare("SELECT * FROM tipoPlatos");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
  
      }catch(Exception $e){
        die($e->getMessage());
      }
  }

    public function listarVenta($usuario){
      try{
        $consulta = $this->conexion->prepare("CALL reporte_deusuario(?)");
        $consulta->execute(array($usuario));
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
  }
}