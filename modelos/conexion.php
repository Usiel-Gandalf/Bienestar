<?php
  class Conexion
  {
    private $host = "localhost";
    private $baseDeDatosPrincipal = "sao";
    private $usuario = "root";
    private $contraseña = "";
    private $conexion;

    function __construct()
    {

      $this->conexion = new mysqli($this->host, $this->usuario, $this->contraseña, $this->baseDeDatosPrincipal);
      if ($this->conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $cthis->conexion->connect_errno . ") " . $this->conexion->connect_error;
      }
      else {
      }
    }

    public function conexionBD()
    {
      echo "conectado";
      return $this->conexion;

    }
  }
 ?>
