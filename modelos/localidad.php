<?php
require_once("conexion.php");
require_once("../librerias/comprobarEntidades.php");
require_once("../librerias/registrarEntidades.php");

  function procesamientoLocalidadInfo($nombreArchivo, $posicionClaveLoc, $posicionNombreLoc, $posicionClaveMun)
  {
    $fp = fopen($nombreArchivo, "r");
    $rows = 0;
    $localidadesNoRegistradas = 0;
    $localidadesRegistradas = 0;

    while ($datos = fgetcsv($fp, 0, ";")) {
      $rows ++;

      if ($rows>1) {
        $resultadoComprobarLocalidad = comprobarLocalidad($datos[$posicionClaveLoc]);

        if (mysqli_num_rows($resultadoComprobarLocalidad)>0) {
            $localidadesNoRegistradas ++;
        }else {
          $resultadoRegistrarLocalidad = registrarLocalidad($datos[$posicionClaveLoc], $datos[$posicionNombreLoc], $datos[$posicionClaveMun]);
          $localidadesRegistradas ++;
        }
      }
    }

    $resultadosRegistros = "<br>Localidades no registradas: ".$localidadesNoRegistradas."<br>Nuevas localidades agregadas: ".$localidadesRegistradas;
    return $resultadosRegistros;
  }

 ?>
