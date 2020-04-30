<?php
require_once("../librerias/main.php");
require_once("../librerias/registrarEntidades.php");
require_once 'conexion.php';

class Universo extends conexion
{
  private $conexion;
  private $arrayRegion;
  private $con;
  function __construct()
  {
    $this->conexion = new Conexion();
    $this->con = $this->conexion->conexionBD();
  }

  public function new()
  {
    //$sql = "SELECT * FROM region";
    $reg = mysqli_query($this->con, "SELECT * FROM region");
    return $reg;
  }

}
$uni = new Universo();
$consulta = $uni->new();
echo "<pre>";
var_dump($consulta);
echo "<pre>";
 ?>
