<?php
if (mysqli_num_rows($comprobarMunicipio)==1) {
    $municipioExistente++;
} else {
    registrarMunicipio($clave_municipio, $nombre_municipio, $clave_region);
    $municipio++;
}

if (mysqli_num_rows($comprobarLocalidad)==1) {
    $localidadExistente++;
} else {
  registrarLocalidad($clave_localidad, $nombre_localidad, $clave_municipio);
  $localidad++;
}

if (mysqli_num_rows($comprobarEscuela)==1) {
    $escuelaExistente++;
} else {
  registrarEscuela($clave_escuela, $nombre_escuela, $clave_localidad);
  $escuela++;
}

if (mysqli_num_rows($comprobarBecario)==1) {
    $becarioExistente++;
} else {
  registrarBecario($clave_becario, $nombre_becario, $apellido_paterno, $apellido_materno, $genero_becario,
                   $fecha_nacimiento, $curp_becario, $clave_escuela);
  $becario++;
}
 ?>
