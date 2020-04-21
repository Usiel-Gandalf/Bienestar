<?php
function registrarBecario($claveBecario, $nombreBecario, $apellidoPaterno, $apellidoMaterno, $genero, $fechaNacimiento, $curp, $claveEscuela)
{
  global $conexion;
  $registrarBecario = "INSERT INTO becario(claveBecario, nombreBecario, apellidoPaterno, apellidoMaterno, genero, fechaNacimiento, curp, claveEscuela)
  VALUES('$claveBecario', '$nombreBecario', '$apellidoPaterno', '$apellidoMaterno', '$genero', $fechaNacimiento, '$curp', '$claveEscuela')";
  $comprobarConsulta = mysqli_query($conexion, $registrarBecario);
  return $comprobarConsulta;
}

 ?>
