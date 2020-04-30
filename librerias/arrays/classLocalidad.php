<?php
class Localidad
{
  private $claveLocalidad;
  private $nombreLocalidad;
  private $claveMunicipio;
  private $universoEntidad = array();
  private $arrayLocalidadRedundante = array();
  private $arrayLocalidadFinal = array();

  function __construct($universoEntidad)
  {
    $this->universoArray = $universoEntidad;
    $this->getEntidad();
    $this->eliminarRedundancia();
  }

  private function getEntidad()
  {
    for ($fila=0; $fila <count($this->universoArray); $fila++) {
      $this->arrayLocalidadRedundante = [
        "clave_localidad"=>$this->universoArray[$fila]["claveLocalidad"],
        "nombre_localidad"=>$this->universoArray[$fila]["nombreLocalidad"],
        "clave_municipio"=>$this->universoArray[$fila]["claveMunicipio"]
      ];
      array_push($this->arrayLocalidadFinal, $this->arrayLocalidadRedundante);
      $this->arrayLocalidadRedundante = array();
    }//end for
  } // end function getEntidad

  public function eliminarRedundancia()
  {
    $result = array_map("unserialize", array_unique(array_map("serialize", $this->arrayLocalidadFinal)));
    foreach ($result as $key => $value)
    {
      if ( is_array($value) )
      {
        $result[$key] = $value;
      }
    }
    $this->arrayLocalidadFinal = $result;
    $this->arrayLocalidadFinal = array_values($this->arrayLocalidadFinal);
  }

  public function localidadFinal()
  {
    return $this->arrayLocalidadFinal;
  }

}

 ?>
