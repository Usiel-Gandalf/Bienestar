<?php
require_once("estado.php");
require_once("region.php");
require_once("municipio.php");

  function procesamientoPruebaInfo($nombreArchivo)
  {
    $fp = fopen($nombreArchivo, "r");
    $fila = 0;
    $posicionClaveEdo;
    $posicionNombreEdo;
    $posicionClaveMun;
    $posicionNombreMun;
    $posicionReg;
    $posicionClaveReg;
    $posicionNombreReg;

    while ($datos = fgetcsv($fp, 0, ";")) {
      $numeroColumnas = count($datos);

      for ($i=0; $i <$numeroColumnas ; $i++) {

        if ($datos[$i] == "CVE_EDO") {
          $posicionClaveEdo = $i;
        }

        if ($datos[$i] == "NOM_EDO") {
        $posicionNombreEdo = $i;
        }

        if ($datos[$i] == "REGION") {
        $posicionReg = $i;
        }

        if ($datos[$i] == "ID_REGION") {
        $posicionClaveReg = $i;
        }

        if ($datos[$i] == "NOM_REG") {
        $posicionNombreReg = $i;
        }

        if ($datos[$i] == "CVE_MUN") {
          $posicionClaveMun = $i;
        }

        if ($datos[$i] == "NOM_MUN") {
          $posicionNombreMun = $i;
        }
      }
      $fila++;
    }
      echo "Procesando informacion, por favor espere.....";
      $estadoInfo = procesamientoEstadoInfo($nombreArchivo, $posicionClaveEdo, $posicionNombreEdo);
      echo $estadoInfo;
      $regionInfo = procesamientoRegionInfo($nombreArchivo, $posicionReg, $posicionClaveReg, $posicionNombreReg, $posicionClaveEdo);
    //  $municipioInfo = procesamientoMunicipioInfo($nombreArchivo, $posicionNombreMun, $posicionClaveMun);


      echo $regionInfo;
      //echo $municipioInfo;
  }

 ?>
