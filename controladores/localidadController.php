<?php
require_once("../modelos/localidad.php");
function procesamientoLocalidadController($nombreArchivo)
{
  $fp = fopen($nombreArchivo, "r");
  $fila = 0;
  $posicionClaveLoc;
  $posicionNombreLoc;
  $posicionClaveMun;

  while ($datos = fgetcsv($fp, 0, ";")) {
    $numeroColumnas = count($datos);

    for ($i=0; $i <$numeroColumnas ; $i++) {
      if ($datos[$i] == "CVE_LOC") {
      $posicionClaveLoc = $i;
      }

      if ($datos[$i] == "NOM_LOC") {
      $posicionNombreLoc = $i;
      }

      if ($datos[$i] == "CVE_MUN") {
      $posicionClaveMun = $i;
      }
    }
  }

  $LocalidadInfo = procesamientoLocalidadInfo($nombreArchivo, $posicionClaveLoc, $posicionNombreLoc, $posicionClaveMun);
  echo $LocalidadInfo;

}
 ?>
