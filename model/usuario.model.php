<?php
require_once 'conexion.php';

class Usuario extends Conexion{
  private $acceso;

  //Constructor
  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();
  }

  public function iniciarSesion($email = ''){
    try{
      $consulta = $this->acceso->prepare("SELECT * FROM administrador WHERE email = ?");
      $consulta->execute(array($email));

      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}
