<?php
require_once("conexion.php");
require_once("../librerias/comprobarEntidades.php");
require_once("../librerias/registrarEntidades.php");

  function procesamientoEscuelaInfo($nombreArchivo, $posicionClaveEsc, $posicionNombreEsc, $posicionClaveLoc)
  {
    $fp = fopen($nombreArchivo, "r");
    $rows = 0;
    $escuelasNoRegistradas = 0;
    $escuelasRegistradas = 0;

    while ($datos = fgetcsv($fp, 0, ";")) {
      $rows ++;

      if ($rows>1) {
        $resultadoComprobarEscuela = comprobarEscuela($datos[$posicionClaveEsc]);

        if (mysqli_num_rows($resultadoComprobarEscuela)>0) {
            $escuelasNoRegistradas ++;
        }else {
          $resultadoRegistrarEscuela = registrarEscuela($datos[$posicionClaveEsc], $datos[$posicionNombreEsc], $datos[$posicionClaveLoc]);
          $escuelasRegistradas ++;
        }
      }
    }

    $resultadosRegistros = "<br>Escuelas no registradas: ".$escuelasNoRegistradas."<br>Nuevas escuelas agregadas: ".$escuelasRegistradas;
    return $resultadosRegistros;
  }

 ?>
