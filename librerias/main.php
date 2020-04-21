<?php
function comprobarMain($clave, $tabla)
{
  global $conexion;
  $clave_tabla = "clave_$tabla";
  if ($tabla == "escuela") {
    $comprobarExistencia = "SELECT * from $tabla WHERE $clave_tabla = '$clave'";
  }else {
    $comprobarExistencia = "SELECT * from $tabla WHERE  $clave_tabla = $clave";
  }
  $comprobarConsulta = mysqli_query($conexion, $comprobarExistencia);
  return $comprobarConsulta;
}
 ?>
