<?php
require_once 'conexion.php';

class DetalleV extends Conexion{
  private $acceso;

  //Constructor
  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();
  }

  public function ListarDeVenta(){
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

  public function actualizar($datos = []){
    $respuesta = [
        "status" => false,
        "message" => ""
    ];
    try{
        $consulta = $this->acceso->prepare("CALL spu_venta_editar(?,?,?,?,?,?)");
        $respuesta["status"] = $consulta->execute(
            array(
                $datos["idventa"],
                $datos["idturno"],
                $datos["idmesa"],
                $datos["idTplato"],
                $datos["plato"],
                $datos["PrecioUni"]
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
}