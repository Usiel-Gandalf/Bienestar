<?php
function registrarEstado($clave_estado, $nombre_estado)
{
  global $conexion;
  $registrarEstado = "INSERT INTO estado(clave_estado, nombre_estado) VALUES($clave_estado, '$nombre_estado')";
  $comprobarConsulta = mysqli_query($conexion, $registrarEstado);
  return $comprobarConsulta;
}

function registrarRegion($clave_region, $region, $nombre_region, $clave_estado)
{
  global $conexion;
  $registrarRegion = "INSERT INTO region(region, clave_region, nombre_region, clave_estado) VALUES($region, $clave_region, '$nombre_region', $clave_estado)";
  $comprobarConsulta = mysqli_query($conexion, $registrarRegion);
  return $comprobarConsulta;
}

function registrarMunicipio($clave_municipio, $nombre_municipio, $clave_region)
{
  global $conexion;
  $registrarMunicipio = "INSERT INTO municipio(clave_municipio, nombre_municipio, clave_region) VALUES($clave_municipio, '$nombre_municipio', $clave_region)";
  $comprobarConsulta = mysqli_query($conexion, $registrarMunicipio);
  return $comprobarConsulta;
}

function registrarLocalidad($clave_localidad, $nombre_localidad, $clave_municipio)
{
  global $conexion;
  $registrarLocalidad = "INSERT INTO localidad(clave_localidad, nombre_localidad, clave_municipio) VALUES($clave_localidad, '$nombre_localidad', $clave_municipio)";
  $comprobarConsulta = mysqli_query($conexion, $registrarLocalidad);
  return $comprobarConsulta;
}

function registrarEscuela($clave_escuela, $nombre_escuela, $clave_localidad)
{
  global $conexion;
  $registrarEscuela = "INSERT INTO escuela(clave_escuela, nombre_escuela, clave_localidad) VALUES('$clave_escuela', '$nombre_escuela', $clave_localidad)";
  $comprobarConsulta = mysqli_query($conexion, $registrarEscuela);
  return $comprobarConsulta;
}

function registrarBecario($clave_becario, $nombre_becario, $apellido_paterno, $apellido_materno, $genero_becario,
                          $fecha_nacimiento, $curp_becario, $clave_escuela)
{
  global $conexion;
  $registrarBecario = "INSERT INTO becario(clave_becario, nombre_becario, apellido_paterno, apellido_materno, genero, fecha_nacimiento, curp, clave_escuela)
  VALUES('$clave_becario', '$nombre_becario', '$apellido_paterno', '$apellido_materno', '$genero_becario',
         $fecha_nacimiento, '$curp_becario', '$clave_escuela')";
  $comprobarConsulta = mysqli_query($conexion, $registrarBecario);
  return $comprobarConsulta;
}

function fecha($fecha)
{
  global $conexion;
  $registrarFecha = "INSERT INTO fecha(fecha) VALUES('$fecha')";
  $comprobarConsulta = mysqli_query($conexion, $registrarFecha);
  return $comprobarConsulta;
}


 ?>
