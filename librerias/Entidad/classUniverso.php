<?php
class Universo
{
  protected $universoEntidad;
  protected $arrayUniverso = array();
  protected $numeroColumnasUniverso = 0;
  protected $datosColumnasUniverso = 0;
  protected $fila = 0;
  protected $posicionClaveEstado;
  protected $posicionNombreEstado;

  function __construct($universoEntidad)
  {
    $this->universoEntidad = $universoEntidad;
    $fp = fopen($this->universoEntidad, "r"); //se lee el archivo csv

    while ($this->datosColumnasUniverso = fgetcsv($fp, 0, ";")) {

      $this->numeroColumnasUniverso = count($this->datosColumnasUniverso);
      if ($this->fila == 0) {

        for ($i=0; $i<$this->numeroColumnasUniverso; $i++) {
          if ($this->datosColumnasUniverso[$i] == "CVE_EDO") {
          $this->posicionClaveEstado = $i;
          }
          if ($this->datosColumnasUniverso[$i] == "NOM_EDO") {
          $this->posicionNombreEstado = $i;
          }

        }// end for

      }else {
        break;
      }
      $this->fila++;
    }// end while

  }// end construct universe

public function getEntidad()
{

}




}// end class universe

 ?>
