<?php
class Becario
{
  private $universoEntidad = array();
  private $arrayBecarioRedundante = array();
  private $arrayBecarioFinal = array();

  function __construct($universoEntidad)
  {
    $this->universoArray = $universoEntidad;
    $this->getEntidad();
    $this->eliminarRedundancia();
  }

  private function getEntidad()
  {
    for ($fila=0; $fila <count($this->universoArray); $fila++) {
      $this->arrayBecarioRedundante = [
        "clave_becario"=>$this->universoArray[$fila]["claveBecario"],
        "nombre_becario"=>$this->universoArray[$fila]["nombreBecario"],
        "apellido_paterno"=>$this->universoArray[$fila]["apellidoPaterno"],
        "apellido_materno"=>$this->universoArray[$fila]["apellidoMaterno"],
        "genero_becario"=>$this->universoArray[$fila]["generoBecario"],
        "fecha_nacimiento"=>$this->universoArray[$fila]["fechaNacimiento"],
        "curp_becario"=>$this->universoArray[$fila]["curpBecario"],
        "clave_escuela"=>$this->universoArray[$fila]["claveEscuela"]
      ];
      array_push($this->arrayBecarioFinal, $this->arrayBecarioRedundante);
      $this->arrayBecarioRedundante = array();
    }//end for
  } // end function getEntidad

  public function eliminarRedundancia()
  {
    $result = array_map("unserialize", array_unique(array_map("serialize", $this->arrayBecarioFinal)));
    foreach ($result as $key => $value)
    {
      if ( is_array($value) )
      {
        $result[$key] = $value;
      }
    }
    $this->arrayBecarioFinal = $result;
    $this->arrayBecarioFinal = array_values($this->arrayBecarioFinal);
  }

  public function becarioFinal()
  {
    return $this->arrayBecarioFinal;
  }

}

 ?>
