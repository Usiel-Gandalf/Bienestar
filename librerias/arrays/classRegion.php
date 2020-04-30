<?php
class Region
{
  private $claveRegion;
  private $nombreRegion;
  private $numeroRegion;
  private $universoEntidad = array();
  private $arrayRegionRedundante = array();
  private $arrayRegionFinal = array();

  function __construct($universoEntidad)
  {
    $this->universoArray = $universoEntidad;
    $this->getEntidad();
    $this->eliminarRedundancia();
  }

  private function getEntidad()
  {
    for ($fila=0; $fila <count($this->universoArray); $fila++) {
      $this->arrayRegionRedundante = [
        "clave_region"=>$this->universoArray[$fila]["claveRegion"],
        "nombre_region"=>$this->universoArray[$fila]["nombreRegion"],
        "numero_region"=>$this->universoArray[$fila]["region"]
      ];
      array_push($this->arrayRegionFinal, $this->arrayRegionRedundante);
      $this->arrayRegionRedundante = array();
    }//end for
  } // end function getEntidad

  public function eliminarRedundancia()
  {
    $result = array_map("unserialize", array_unique(array_map("serialize", $this->arrayRegionFinal)));
    foreach ($result as $key => $value)
    {
      if ( is_array($value) )
      {
        $result[$key] = $value;
      }
    }
    $this->arrayRegionFinal = $result;
    $this->arrayRegionFinal = array_values($this->arrayRegionFinal);
  }

  public function regionFinal()
  {
    return $this->arrayRegionFinal;
  }

}

 ?>
