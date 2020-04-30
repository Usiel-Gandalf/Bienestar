<?php
class Escuela
{
  private $claveEscuela;
  private $nombreEscuela;
  private $claveLocalidad;
  private $universoEntidad = array();
  private $arrayEscuelaRedundante = array();
  private $arrayEscuelaFinal = array();

  function __construct($universoEntidad)
  {
    $this->universoArray = $universoEntidad;
    $this->getEntidad();
    $this->eliminarRedundancia();
  }

  private function getEntidad()
  {
    for ($fila=0; $fila <count($this->universoArray); $fila++) {
      $this->arrayEscuelaRedundante = [
        "clave_escuela"=>$this->universoArray[$fila]["claveEscuela"],
        "nombre_escuela"=>$this->universoArray[$fila]["nombreEscuela"],
        "clave_localidad"=>$this->universoArray[$fila]["claveLocalidad"]
      ];
      array_push($this->arrayEscuelaFinal, $this->arrayEscuelaRedundante);
      $this->arrayEscuelaRedundante = array();
    }//end for
  } // end function getEntidad

  public function eliminarRedundancia()
  {
    $result = array_map("unserialize", array_unique(array_map("serialize", $this->arrayEscuelaFinal)));
    foreach ($result as $key => $value)
    {
      if ( is_array($value) )
      {
        $result[$key] = $value;
      }
    }
    $this->arrayEscuelaFinal = $result;
    $this->arrayEscuelaFinal = array_values($this->arrayEscuelaFinal);
  }

  public function escuelaFinal()
  {
    return $this->arrayEscuelaFinal;
  }

}

 ?>
