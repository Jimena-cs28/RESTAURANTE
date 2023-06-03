<?php
require_once 'conexion.php';

class Usuario extends Conexion{
  private $acceso;

  //Constructor
  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();
  }

  public function iniciarSesion($nombreusu = ""){
    try{
      $consulta = $this->acceso->prepare("CALL spu_login(?)");
      $consulta->execute(array($nombreusu));

      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}
