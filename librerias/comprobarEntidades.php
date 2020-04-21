<?php
function comprobarEstado($claveEstado)
{
  global $conexion;
  $comprobarExistenciaEstado = "SELECT * from estado WHERE claveEstado = $claveEstado";
  $comprobarConsulta = mysqli_query($conexion, $comprobarExistenciaEstado);
  return $comprobarConsulta;
}

function comprobarRegion($claveRegion)
{
  global $conexion;
  $comprobarExistenciaRegion = "SELECT * from region WHERE claveRegion = $claveRegion";
  $comprobarConsulta = mysqli_query($conexion, $comprobarExistenciaRegion);
  return $comprobarConsulta;
}

function comprobarMunicipio($claveMunicipio)
{
  global $conexion;
  $comprobarExistenciaMunicipio = "SELECT * from municipio WHERE claveMunicipio = $claveMunicipio";
  $comprobarConsulta = mysqli_query($conexion, $comprobarExistenciaMunicipio);
  return $comprobarConsulta;
}

function comprobarLocalidad($claveLocalidad)
{
  global $conexion;
  $comprobarExistenciaLocalidad = "SELECT * from localidad WHERE claveLocalidad = $claveLocalidad";
  $comprobarConsulta = mysqli_query($conexion, $comprobarExistenciaLocalidad);
  return $comprobarConsulta;
}

function comprobarEscuela($claveEscuela)
{
  global $conexion;
  $comprobarExistenciaEscuela = "SELECT * from escuela WHERE claveEscuela = '$claveEscuela'";
  $comprobarConsulta = mysqli_query($conexion, $comprobarExistenciaEscuela);
  return $comprobarConsulta;
}

function comprobarBecario($claveBecario)
{
  global $conexion;
  $comprobarExistenciaBecario = "SELECT * from becario WHERE claveBecario = '$claveBecario'";
  $comprobarConsulta = mysqli_query($conexion, $comprobarExistenciaBecario);
  return $comprobarConsulta;
}
 ?>
