<?php
require_once("../modelos/becario.php");
function procesamientoBecarioController($nombreArchivo)
{
  $fp = fopen($nombreArchivo, "r");
  $fila = 0;
  $posicionClaveBecario;
  $posicionNombreBecario;
  $posicionApellidoPBecario;
  $posicionApellidoMBecario;
  $posicionGeneroBecario;
  $posicionFechaNaBecario;
  $posicionCurpBecario;
  $posicionClaveEsc;

  while ($datos = fgetcsv($fp, 0, ";")) {
    $numeroColumnas = count($datos);

    for ($i=0; $i <$numeroColumnas ; $i++) {
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

      if ($datos[$i] == "CVE_ESC") {
      $posicionClaveEsc = $i;
      }
    }
  }

  $becarioInfo = procesamientoBecarioInfo($nombreArchivo, $posicionClaveBecario, $posicionNombreBecario,
  $posicionApellidoPBecario, $posicionApellidoMBecario, $posicionGeneroBecario, $posicionFechaNaBecario,
  $posicionCurpBecario, $posicionClaveEsc);
  echo $becarioInfo;

}
 ?>
