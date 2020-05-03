<?php
require_once '../bd/conexion.php';

class EscuelaModel extends conexion
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
      $clave_escuela = $arrayEntidad[$fila]["clave_escuela"];
      $result = self::comprobarEntidad($clave_escuela);
      if ($result == false) {
        $registrar = self::registrarEntidad($arrayEntidad[$fila]);
      }
    }

  }

  public function comprobarEntidad($valor)
  {
    $resultado = $this->conexion->stmt_init();
    $resultado->prepare("SELECT clave_escuela FROM escuela WHERE clave_escuela = '$valor'");
    $resultado->execute();
    $resultado->bind_result($clave_escuela);
    if ($resultado != null) {
      $resultado->close();
      return true;
    }else {
      $resultado->close();
      return false;
    }
  }

  public function registrarEntidad($arrayEntidad)
  {
    $clave_escuela = $arrayEntidad["clave_escuela"];
    $nombre_escuela = $arrayEntidad["nombre_escuela"];
    $clave_localidad = $arrayEntidad["clave_localidad"];

    $insert = $this->conexion->stmt_init();
    $insert->prepare("INSERT INTO escuela(clave_escuela, nombre_escuela, clave_localidad) VALUES(?,?,?)");
    $insert->bind_param('ssi', $clave_localidad, $nombre_localidad, $clave_municipio);
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
