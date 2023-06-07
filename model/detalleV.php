<?php
require_once 'conexion.php';

class DetalleV extends Conexion{
  private $acceso;

  //Constructor
  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();
  }

  public function ListarDeVenta($idventa){
    try{
      $consulta = $this->acceso->prepare("CALL spu_listar_deventa(?)");
      $consulta->execute(array($idventa));

      $datosObtenidos = $consulta->fetchAll(PDO::FETCH_ASSOC);
      return $datosObtenidos;
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function actualizar($datos = []){
    $respuesta = [
      "status" => false,
      "message" => ""
    ];
    try{
        $consulta = $this->acceso->prepare("CALL spu_editar_venta(?,?,?,?,?)");
        $respuesta["status"] = $consulta->execute(
            array(
                $datos["idventa"],
                $datos["idcliente"],
                $datos["tipopago"],
                $datos["comprobante"],
                $datos["totalpagar"]
            )
        );
    }
    catch(Exception $e){
        $respuesta["message"] = "No se ah podido completar el proceso. Codigo error: " . $e->getCode();
    }
    return $respuesta;
  } 

  public function eliminar($idventa = 0){
    $respuesta = [
      "status" => false,
      "message" => ""
    ];
    try{
      $consulta = $this->acceso->prepare("CALL spueliminarventa(?)");
      $respuesta["status"] = $consulta->execute(array($idventa));
    }
    catch(Exception $e){
      $respuesta["message"] = "No se ah podido completar el proceso. Codigo error: " . $e->getCode();
    }
    return $respuesta;
  }
  
  public function obtener($idventa = 0){
    try{
      $consulta = $this->acceso->prepare("CALL spu_obtener_venta(?)");
      $consulta->execute(array($idventa));
      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function registrarDe($datos = []){

    $respuesta = [
      "status" => false,
      "message" =>""
    ];
    try{
      $consulta = $this->acceso->prepare("CALL spu_registrar_deventa(?,?,?,?)");
      $respuesta["status"] = $consulta->execute(
        array(
          $datos["idventa"],
          $datos["cantidad"],
          $datos["idmenu"],
          $datos["total"]
        )
      );
    }
    catch(Exception $e){
      $respuesta["message"] = "No se pudo completar". $e->getCode();
    }
    return $respuesta;
  }
}