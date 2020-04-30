<?php
class Municipio
{
  private $claveMunicipio;
  private $nombreMunicipio;
  private $claveRegion;
  private $universoEntidad = array();
  private $arrayMunicipioRedundante = array();
  private $arrayMunicipioFinal = array();

  function __construct($universoEntidad)
  {
    $this->universoArray = $universoEntidad;
    $this->getEntidad();
    $this->eliminarRedundancia();
  }

  private function getEntidad()
  {
    for ($fila=0; $fila <count($this->universoArray); $fila++) {
      $this->arrayMunicipioRedundante = [
        "clave_municipio"=>$this->universoArray[$fila]["claveMunicipio"],
        "nombre_municipio"=>$this->universoArray[$fila]["nombreMunicipio"],
        "clave_region"=>$this->universoArray[$fila]["claveRegion"]
      ];
      array_push($this->arrayMunicipioFinal, $this->arrayMunicipioRedundante);
      $this->arrayMunicipioRedundante = array();
    }//end for
  } // end function getEntidad

  public function eliminarRedundancia()
  {
    $result = array_map("unserialize", array_unique(array_map("serialize", $this->arrayMunicipioFinal)));
    foreach ($result as $key => $value)
    {
      if ( is_array($value) )
      {
        $result[$key] = $value;
      }
    }
    $this->arrayMunicipioFinal = $result;
    $this->arrayMunicipioFinal = array_values($this->arrayMunicipioFinal);
  }

  public function municipioFinal()
  {
    return $this->arrayMunicipioFinal;
  }

}

 ?>
