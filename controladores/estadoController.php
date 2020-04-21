<?php
require_once("../modelos/estado.php");
function procesamientoEstadoController($nombreArchivo)
{
  $fp = fopen($nombreArchivo, "r");
  $fila = 0;
  $posicionClaveEdo;
  $posicionNombreEdo;

  while ($datos = fgetcsv($fp, 0, ";")) {
    $numeroColumnas = count($datos);

    for ($i=0; $i <$numeroColumnas ; $i++) {
      if ($datos[$i] == "CVE_EDO") {
        $posicionClaveEdo = $i;
      }

      if ($datos[$i] == "NOM_EDO") {
      $posicionNombreEdo = $i;
      }
    }
  }

  $estadoInfo = procesamientoEstadoInfo($nombreArchivo, $posicionClaveEdo, $posicionNombreEdo);
  echo $estadoInfo;
}
 ?>
