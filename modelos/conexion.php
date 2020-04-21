<?php
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

 ?>
