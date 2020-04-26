<?php
  function arrayMunicipio($municipio_sin_redundancia, $becarios)
  {
    $municipio_array_final = array();
    $clave_municipio_municipio = null;

      for($i=0; $i < count($municipio_sin_redundancia); $i++) {
        $clave_municipio_municipio = $municipio_sin_redundancia[$2];

        for($i=0; $i < count($becarios); $i++) {
          $numero_municipio = "municipio".$i;
          $clave_municipio_becarios = $becarios[$i]["claveMunicipio"];
          if ($clave_municipio_becarios = $clave_municipio_municipio) {
              $nombre_municipio_becarios = $becarios[$i]["nombreMunicipio"];
              $clave_region_becarios = $becarios[$i]["claveRegion"];
              $numero_municipio =[
                "clave_municipio"=>$clave_municipio_becarios,
                "nombre_region"=>$nombre_municipio_becarios,
                "clave_region"=>$clave_region_becarios
              ];
              array_push($municipio_array_final, $numero_municipio);
              $clave_municipio_municipio = null;
              break;
          }
        }// fin del segundo for
      }// fin del primer for
      return $municipio_array_final;
  }
 ?>
