<?php
require_once '../bd/conexion.php';

class RegionModel extends conexion
{
  private $conexion;
  private $arrayEntidad;

  function __construct()
  {
    //$this->arrayEntidad = $arrayEntidad;
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
  }

  public function consulta($arrayEntidad)
  {
    for ($fila=0; $fila < count($arrayEntidad) ; $fila++) {
      $clave_region = $arrayEntidad[$fila]["clave_region"];
      $result = self::comprobarEntidad($clave_region);
      if ($result) {
      }else {
        $registrar = self::registrarEntidad($arrayEntidad[$fila]);
      }
    }

  }

  public function comprobarEntidad($valor)
  {
    //$resultado = $this->conexion->query();
    //$result = $resultado->fetch_array(MYSQLI_BOTH);
    $resultado = $this->conexion->stmt_init();
    $resultado->prepare("SELECT clave_region FROM region WHERE clave_region = $valor");
    $resultado->execute();
    $resultado->bind_result($clave_region);
    if ($resultado != null) {
      $resultado->close();
      return true;
    }else {
      $resultado->close();
      return false;
    }
    //if ($result != null) {
    //  $resultado->close();
    //  return true;
    //}else {
    //  $resultado->close();
    //  return false;
    //}
  }

  public function registrarEntidad($arrayEntidad)
  {
    $clave_region = $arrayEntidad["clave_region"];
    $nombre_region = $arrayEntidad["nombre_region"];
    $region = $arrayEntidad["numero_region"];

    $insert = $this->conexion->stmt_init();
    $insert->prepare("INSERT INTO region(clave_region, region, nombre_region, clave_estado) VALUES(?,?,?,20)");
    $insert->bind_param('iis', $clave_region, $region, $nombre_region);
    $insert->execute();
    if ($insert) {
      $insert->close();
      return true;
    }else {
      $insert->close();
      return false;
    }

  }

}

//$universo = new RegionModel("hello world");
//$universo->registrarRegiones(20009);
//$universo->consulta();
 ?>
