<?php
require_once '../bd/conexion.php';

class MunicipioModel extends conexion
{
  private $conexion;

  function __construct()
  {
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
  }

  public function consulta($arrayEntidad)
  {
    for ($fila=0; $fila < count($arrayEntidad) ; $fila++) {
      $clave_municipio = $arrayEntidad[$fila]["clave_municipio"];
      $result = self::comprobarEntidad($clave_municipio);
      if ($result == false) {
        $registrar = self::registrarEntidad($arrayEntidad[$fila]);
      }
    }

  }

  public function comprobarEntidad($valor)
  {
    $resultado = $this->conexion->stmt_init();
    $resultado->prepare("SELECT clave_municipio FROM municipio WHERE clave_municipio = $valor");
    $resultado->execute();
    $resultado->bind_result($clave_municipio);
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
    $clave_municipio = $arrayEntidad["clave_municipio"];
    $nombre_municipio = $arrayEntidad["nombre_municipio"];
    $clave_region = $arrayEntidad["clave_region"];

    $insert = $this->conexion->stmt_init();
    $insert->prepare("INSERT INTO municipio(clave_municipio, nombre_municipio, clave_region) VALUES(?,?,?)");
    $insert->bind_param('isi', $clave_municipio, $nombre_municipio, $claveRegion);
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
 ?>
