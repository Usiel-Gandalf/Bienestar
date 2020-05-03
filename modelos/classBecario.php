<?php
require_once '../bd/conexion.php';

class BecarioModel extends conexion
{
  private $conexion;
  private $arrayEntidad;

  function __construct()
  {
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
  }

  public function consulta($arrayEntidad)
  {
    for ($fila=0; $fila < count($arrayEntidad) ; $fila++) {
      $clave_becario = $arrayEntidad[$fila]["clave_becario"];
      $result = self::comprobarEntidad($clave_becario);
      if ($result == false) {
        $registrar = self::registrarEntidad($arrayEntidad[$fila]);
      }
    }

  }

  public function comprobarEntidad($valor)
  {
    $resultado = $this->conexion->stmt_init();
    $resultado->prepare("SELECT clave_becario FROM becario WHERE clave_becario = $valor");
    $resultado->execute();
    $resultado->bind_result($clave_becario);
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
    $clave_becario = $arrayEntidad["clave_becario"];
    $nombre_becario = $arrayEntidad["nombre_becario"];
    $apellido_paterno = $arrayEntidad["apellido_paterno"];
    $apellido_materno = $arrayEntidad["apellido_materno"];
    $genero_becario = $arrayEntidad["genero_becario"];
    $fecha_nacimiento = $arrayEntidad["fecha_nacimiento"];
    $curp_becario = $arrayEntidad["curp_becario"];
    $clave_escuela = $arrayEntidad["clave_escuela"];

    $insert = $this->conexion->stmt_init();
    $insert->prepare("INSERT INTO becario(clave_becario, nombre_becario, apellido_paterno, apellido_materno, genero, fecha_nacimiento, curp, clave_escuela)
    VALUES(?,?,?,?,?,?,?,?)");
    $insert->bind_param('isssssss', $clave_becario, $nombre_becario, $apellido_paterno, $apellido_materno, $genero_becario, $fecha_nacimiento, $curp_becario, $clave_escuela);
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
