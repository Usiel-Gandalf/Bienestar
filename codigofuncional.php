<?php
if (copy($archivoCopiado, $nombreArchivo)) {

      $fp = fopen($nombreArchivo, "r");
      $rows = 0;

      while ($datos = fgetcsv($fp, 0, ";")) {
        $rows ++;

        if ($rows>1) {
          $resultadoComprobarEstado = comprobarEstado($datos[0]);
          $resultadoComprobarRegion = comprobarRegion($datos[2]);

          if (mysqli_num_rows($resultadoComprobarEstado)>0) {
            //  echo "El estado Ya existe";
          }else {
            $resultadoInsertarEstado = insertarEstado($datos[0], $datos[1]);
            echo "Se ha insertado un nuevo estado correctamente";
          }


          if (mysqli_num_rows($resultadoComprobarRegion)>0) {

          }else {
            $resultadoInsertarRegion = insertarEstado($datos[2], $datos[3]);
            echo "Se ha insertado una nueva region";
          }


        }
      }

}else {
  echo "la copia no fue exitosa";
}

 ?>
