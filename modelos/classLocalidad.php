<?php
require_once '../bd/conexion.php';

class LocalidadModel extends conexion
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
      $clave_localidad = $arrayEntidad[$fila]["clave_localidad"];
      $result = self::comprobarEntidad($clave_localidad);
      if ($result == false) {
        $registrar = self::registrarEntidad($arrayEntidad[$fila]);
      }
    }

  }

  public function comprobarEntidad($valor)
  {
    $resultado = $this->conexion->stmt_init();
    $resultado->prepare("SELECT clave_localidad FROM localidad WHERE clave_localidad = $valor");
    $resultado->execute();
    $resultado->bind_result($clave_localidad);
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
    $clave_localidad = $arrayEntidad["clave_localidad"];
    $nombre_localidad = $arrayEntidad["nombre_localidad"];
    $clave_municipio = $arrayEntidad["clave_municipio"];

    $insert = $this->conexion->stmt_init();
    $insert->prepare("INSERT INTO localidad(clave_localidad, nombre_localidad, clave_municipio) VALUES(?,?,?)");
    $insert->bind_param('isi', $clave_localidad, $nombre_localidad, $clave_municipio);
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
