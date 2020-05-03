<?php
$consulta = $this->conexion->stmt_init();
$consulta->prepare("SELECT * FROM region WHERE clave_region = $valor");
$consulta->execute();
if ($consulta->fetch() != null) {
  echo "la region existe <br>";
  //$consulta->close();
  $this->conexion->close();
}else {
  echo "no existe la region <br>";
  //$consulta->close();
  $this->conexion->close();
}













$host = "localhost";
$baseDeDatosPrincipal = "sao";
$usuario = "root";
$contraseña = "";

$tablaAdministradores = "administrador";

$conexion = new mysqli($host, $usuario, $contraseña, $baseDeDatosPrincipal);

if ($conexion->connect_errno) {
  echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
else {

}






      $clave_municipio = $becarios[$i]["claveMunicipio"];
      $nombre_municipio = $becarios[$i]["nombreMunicipio"];
      $clave_region = $becarios[$i]["claveRegion"];
      $clave_localidad = $becarios[$i]["claveLocalidad"];
      $nombre_localidad = $becarios[$i]["nombreLocalidad"];
      $clave_escuela = $becarios[$i]["claveEscuela"];
      $nombre_escuela = $becarios[$i]["nombreEscuela"];
      $clave_becario = $becarios[$i]["claveBecario"];
      $nombre_becario = $becarios[$i]["nombreBecario"];
      $apellido_paterno = $becarios[$i]["apellidoPaterno"];
      $apellido_materno = $becarios[$i]["apellidoMaterno"];
      $genero_becario = $becarios[$i]["generoBecario"];
      $fecha_nacimiento = $becarios[$i]["fechaNacimiento"];
      $curp_becario = $becarios[$i]["curpBecario"];

     $comprobarMunicipio = comprobarMain($clave_municipio, "municipio");
      $comprobarLocalidad = comprobarMain($clave_localidad, "localidad");
     $comprobarEscuela = comprobarMain($clave_escuela, "escuela");
     $comprobarBecario = comprobarMain($clave_becario, "becario");

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

    echo "Nuevos municipios: ".$municipio."Municipios existentes: ".$municipioExistente."<br>";
    echo "Nuevas localidades: ".$localidad."localidades existentes: ".$localidadExistente."<br>";
    echo "Nuevas escuelas: ".$escuela."escuelas existentes: ".$escuelaExistente."<br>";
    echo "Nuevos becarios: ".$becario."becarios existentes: ".$becarioExistente."<br>";
 ?>
