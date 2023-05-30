<?php
require_once 'conexion.php';

class Ventas extends Conexion{
  private $acceso;

  //Constructor
  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();
  }

  public function ListarVenta(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_listar_deventa()");
      $consulta->execute();

      $datosObtenidos = $consulta->fetch(PDO::FETCH_ASSOC);
      return $datosObtenidos;
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  
  public function listarTurno(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_listarturno()");
      $consulta->execute();

      return $consulta->fetch(PDO::FETCH_NUM);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarPersona(){
    try{
      $consulta = $this->acceso->prepare("SELECT nombres,apellidos FROM personas");
      $consulta->execute();

      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}
