<?php
require_once 'conexion.php';

class Ventas extends Conexion{
  private $acceso;

  //Constructor
  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();
  }

  //listo
  public function listarventas(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_listar_venta()");
      $consulta->execute();

      $datosObtenidos = $consulta->fetchAll(PDO::FETCH_ASSOC);
      return $datosObtenidos;
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarmesa(){
    try{
      $consulta = $this->acceso->prepare("SELECT numMesa FROM ventas");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarCliente(){
    try{
      $consulta = $this->acceso->prepare("SELECT * FROM personas");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }


  public function registrarV($datos = []){

    $respuesta = [
      "status" => false,
      "message" =>""
    ];
    try{
      $consulta = $this->acceso->prepare("CALL spu_registrar_venta(?,?)");
      $respuesta["status"] = $consulta->execute(
        array(
          $datos["idusuario"],
          $datos["numMesa"]
        )
      );
    }
    catch(Exception $e){
      $respuesta["message"] = "No se pudo completar". $e->getCode();
    }
    return $respuesta;
  }

  
}
