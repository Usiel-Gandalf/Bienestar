<?php
function registrarBecario($clave_becario, $nombre_becario, $apellido_paterno, $apellido_materno, $genero_becario,
                 $fecha_nacimiento, $curp_becario, $clave_escuela)
{
  global $conexion;
  $registrarBecario = "INSERT INTO becario(claveBecario, nombreBecario, apellidoPaterno, apellidoMaterno, genero, fechaNacimiento, curp, claveEscuela)
  VALUES('$claveBecario', '$nombreBecario', '$apellidoPaterno', '$apellidoMaterno', '$genero', $fechaNacimiento, '$curp', '$claveEscuela')";
  $comprobarConsulta = mysqli_query($conexion, $registrarBecario);
  return $comprobarConsulta;
}

 ?>
