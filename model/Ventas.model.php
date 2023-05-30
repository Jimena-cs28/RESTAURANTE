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
      $consulta = $this->acceso->prepare("CALL spu_listar_turno()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarMesa(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_listar_mesa()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  public function listarCliente(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_listar_cliente()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarPago(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_listar_Tpago()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarAdmi(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_listar_admi()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarPlato(){
    try{
      $consulta = $this->acceso->prepare("CALL spu_listar_tplato()");
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
      $consulta = $this->acceso->prepare("spu_registrar_venta(?,?,?,?,?,?,?)");
      $respuesta["status"] = $consulta->execute(
        array(
          $datos["idturno"],
          $datos["idadmi"],
          $datos["idmesa"],
          $datos["idTplato"],
          $datos["idcliente"],
          $datos["plato"],
          $datos["comprobante"]
        )
      );
    }
    catch(Exception $e){
      $respuesta["message"] = "No se pudo completar". $e->getCode();
    }
    return $respuesta;
  }
}
