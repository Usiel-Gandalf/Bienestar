<?php
function universoArray($entidadUniverso) // funcion que recibe el archivo excel/csv
{
  $fp = fopen($entidadUniverso, "r"); //se lee el archivo csv
  $fila = 0;
  $posicionClaveReg;
  $posicionClaveMun;
  $posicionClaveLoc;
  $posicionClaveEsc;
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
  $posicionClaveBanco;
  $posicionNombreBanco;

  $becarios = [];

  while ($datos = fgetcsv($fp, 0, ";")) { // se leen las columnas separadas por ;
    $numeroColumnas = count($datos); // se obtiene el numero total de columnas

    if ($fila == 0) {

      for ($i=0; $i <$numeroColumnas ; $i++) {// se leen las columnas y se asignan sugun sus condiciones

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

        if ($datos[$i] == "CLAVEOFI") {
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

        if ($datos[$i] == "CVE_LIQ") {
            $posicionClaveBanco = $i;
        }

        if ($datos[$i] == "NOM_LIQ") {
            $posicionNombreBanco = $i;
        }
      } // fin del for
    } // fin del if

    elseif ($fila >= 1) { // comienza a leer los datos en sus posiciones especificas
      $becario = $fila;
      $fecha = $datos[$posicionFechaNaBecario];
      $fecha_sin_formato = str_replace("/", "", $fecha);
      $anio = substr($fecha_sin_formato, -4);
      $mes = substr($fecha_sin_formato, -6, 2);
      $dia = substr($fecha_sin_formato, -8, 2);
      $fecha_con_formato= $anio."-".$mes."-".$dia;

      $becario = [ // guarda los datos de manera precisa en un array
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
        "fechaNacimiento" => $fecha_con_formato,
        "curpBecario" => $datos[$posicionCurpBecario],
        "claveBanco" => $datos[$posicionClaveBanco],
        "nombreBanco" => $datos[$posicionNombreBanco]
      ]; // fin del array
        array_push ($becarios , $becario); // se agregan fila por fila los becarios al array principal
    } // fin del elseif

    $fila++;
  } // fin del while
  return $becarios;
}
 ?>