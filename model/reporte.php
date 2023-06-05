<?php

require_once 'conexion.php';

class Listar extends Conexion{
    private $conexion;

    public function __CONSTRUCT(){
        $this->conexion = parent::getConexion();
    }
      
    public function listarTurno(){
      try{
        $consulta = $this->conexion->prepare("SELECT * FROM turnos");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
  
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function listarVenta($turno){
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

    public function listarVenta1($plato){
      try{
        $consulta = $this->conexion->prepare("CALL reporte_tPlato(?)");
        $consulta->execute(array($plato));
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
  }
}