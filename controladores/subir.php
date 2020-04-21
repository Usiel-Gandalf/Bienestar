<?php

require_once("main.php");

  if (isset($_POST["subir"])) { // ¿Que nivel de base de datos es?
    $archivo = $_FILES['archivo']['name'];
    $archivoCopiado = $_FILES['archivo']['tmp_name'];
    $nombreArchivo = "../archivos/educacionSuperior/JES/prueba".$archivo; //aqui asignamos el nombre y la ruta dependiendo de la opcion que se haya elegido
    $comprobarCopia = copy($archivoCopiado, $nombreArchivo);

    if ($comprobarCopia) {
      /*  $procesarEstadoController = procesamientoEstadoController($nombreArchivo);
        echo $procesarEstadoController;
        $procesarRegionController = procesamientoRegionController($nombreArchivo);
        echo $procesarRegionController;
        $procesarMunicipioController = procesamientoMunicipioController($nombreArchivo);
        echo $procesarMunicipioController;
        $procesarLocalidadController = procesamientoLocalidadController($nombreArchivo);
        echo $procesarLocalidadController;
        $procesarEscuelaController = procesamientoEscuelaController($nombreArchivo);
        echo $procesarEscuelaController;*/
        //$procesarBecarioController = procesamientoBecarioController($nombreArchivo);
        //echo $procesarBecarioController;
        $procesarMainController = procesarMainController($nombreArchivo);
        print_r($procesarMainController);

    } else {
      echo "No se ha realizado la copia";
    }

}
 ?>
