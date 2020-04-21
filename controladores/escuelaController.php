<?php
require_once("../modelos/escuela.php");
function procesamientoEscuelaController($nombreArchivo)
{
  $fp = fopen($nombreArchivo, "r");
  $fila = 0;
  $posicionClaveEsc;
  $posicionNombreEsc;
  $posicionClaveLoc;

  while ($datos = fgetcsv($fp, 0, ";")) {
    $numeroColumnas = count($datos);

    for ($i=0; $i <$numeroColumnas ; $i++) {
      if ($datos[$i] == "CVE_ESC") {
      $posicionClaveEsc = $i;
      }

      if ($datos[$i] == "NOM_ESC") {
      $posicionNombreEsc = $i;
      }

      if ($datos[$i] == "CVE_LOC") {
      $posicionClaveLoc = $i;
      }
    }
  }

  $escuelaInfo = procesamientoEscuelaInfo($nombreArchivo, $posicionClaveEsc, $posicionNombreEsc, $posicionClaveLoc);
  echo $escuelaInfo;

}
 ?>
