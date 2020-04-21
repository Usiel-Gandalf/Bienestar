<?php
require_once("../modelos/main.php");
function procesarMainController($nombreArchivo) // funcion que recibe el archivo excel/csv
{
  $fp = fopen($nombreArchivo, "r"); //se lee el archivo csv
  $fila = 0;
  $posicionClaveEdo;
  $posicionClaveReg;
  $posicionClaveMun;
  $posicionClaveLoc;
  $posicionClaveEsc;
  $posicionNombreEdo;
  $posicionReg;
  $posicionNombreReg;
  $posicionNombreMun;
  $posicionNombreLoc;
  $posicionNombreEsc;
  $posicionClaveBecario;
  $posicionNombreBecario;
  $posicionApellidoPBecario;
  $posicionApellidoMBecario;
  $posicionGeneroBecario;
  $posicionFechaNaBecario;
  $posicionCurpBecario;

  $becarios = [];

  while ($datos = fgetcsv($fp, 0, ";")) { // se leen las columnas separadas por ;
    $numeroColumnas = count($datos); // se obtiene el numero total de columnas

    if ($fila == 0) {

      for ($i=0; $i <$numeroColumnas ; $i++) {// se leen las columnas y se asignan sugun sus condiciones
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

        if ($datos[$i] == "CVE_LOC") {
        $posicionClaveLoc = $i;
        }

        if ($datos[$i] == "NOM_LOC") {
        $posicionNombreLoc = $i;
        }

        if ($datos[$i] == "CVE_ESC") {
        $posicionClaveEsc = $i;
        }

        if ($datos[$i] == "NOM_ESC") {
        $posicionNombreEsc = $i;
        }

        if ($datos[$i] == "INT_ID") {
        $posicionClaveBecario = $i;
        }

        if ($datos[$i] == "NOM_BEC") {
        $posicionNombreBecario = $i;
        }

        if ($datos[$i] == "AP1") {
        $posicionApellidoPBecario = $i;
        }

        if ($datos[$i] == "AP2") {
        $posicionApellidoMBecario = $i;
        }

        if ($datos[$i] == "GENERO") {
        $posicionGeneroBecario = $i;
        }

        if ($datos[$i] == "FECHA_NACIMIENTO") {
        $posicionFechaNaBecario = $i;
        }

        if ($datos[$i] == "CURP") {
        $posicionCurpBecario = $i;
        }
      } // fin del for
    } // fin del if

    elseif ($fila >= 1) { // comienza a leer los datos en sus posiciones especificas
      $becario = $fila;
      //date_default_timezone_set("America/Mexico_City");
      //$fecha = $datos[$posicionFechaNaBecario];
      //$fecha_correcta = date_format($fecha, 'Y-m-d');
      //$fecha= strtotime($fecha);
      //$fecha_correcta = date("Y/m/d", $fecha);
    //  echo ´<script></script>´;

      $becario = [ // guarda los datos de manera precisa en un array
        "claveEstado" => $datos[$posicionClaveEdo],
        //"nombreEstado" => $datos[$posicionNombreEdo],
        "claveRegion" => $datos[$posicionClaveReg],
        "region" => $datos[$posicionReg],
        "nombreRegion" => $datos[$posicionNombreReg],
        "claveMunicipio" => $datos[$posicionClaveMun],
        "nombreMunicipio" => $datos[$posicionNombreMun],
        "claveLocalidad" => $datos[$posicionClaveLoc],
        "nombreLocalidad" => $datos[$posicionNombreLoc],
        "claveEscuela" => $datos[$posicionClaveEsc],
        "nombreEscuela" => $datos[$posicionNombreEsc],
        "claveBecario" => $datos[$posicionClaveBecario],
        "nombreBecario" => $datos[$posicionNombreBecario],
        "apellidoPaterno" => $datos[$posicionApellidoPBecario],
        "apellidoMaterno" => $datos[$posicionApellidoMBecario],
        "generoBecario" => $datos[$posicionGeneroBecario],
        "fechaNacimiento" => $datos[$posicionFechaNaBecario],
        "curpBecario" => $datos[$posicionCurpBecario]
      ]; // fin del array
        array_push ($becarios , $becario); // se agregan fila por fila los becarios al array principal
    } // fin del elseif

    $fila++;
  } // fin del while

$procesamientoMain = procesamientoMainInfo($becarios);
echo $procesamientoMain;
}
 ?>
