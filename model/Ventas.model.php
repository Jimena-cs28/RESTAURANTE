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

      $datosObtenidos = $consulta->fetchAll(PDO::FETCH_ASSOC);
      return $datosObtenidos;
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  
  public function listarTurno(){
    try{
      $consulta = $this->acceso->prepare("SELECT * FROM turnos");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarMesa(){
    try{
      $consulta = $this->acceso->prepare("SELECT * FROM mesas");
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

  public function listarPago(){
    try{
      $consulta = $this->acceso->prepare("SELECT * FROM tipopagos");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarAdmi(){
    try{
      $consulta = $this->acceso->prepare("SELECT * FROM administrador");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarPlato(){
    try{
      $consulta = $this->acceso->prepare("SELECT * FROM tipoPlatos");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarCompro(){
    try{
      $consulta = $this->acceso->prepare("SELECT * FROM comprobante");
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
      $consulta = $this->acceso->prepare("CALL spu_registrar_venta(?,?,?,?,?)");
      $respuesta["status"] = $consulta->execute(
        array(
          $datos["idturno"],
          $datos["idadmi"],
          $datos["idmesa"],
          $datos["idTplato"],
          $datos["plato"],
        )
      );
    }
    catch(Exception $e){
      $respuesta["message"] = "No se pudo completar". $e->getCode();
    }
    return $respuesta;
  }
}
