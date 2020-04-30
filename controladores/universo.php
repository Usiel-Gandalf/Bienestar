<?php
require_once '../librerias/arrays/universoArray.php';
require_once '../librerias/arrays/classRegion.php';
require_once '../librerias/arrays/classMunicipio.php';
require_once '../librerias/arrays/classLocalidad.php';
require_once '../librerias/arrays/classEscuela.php';
require_once '../librerias/arrays/classBecario.php';

  if (isset($_POST["subir"])) { // ¿Que nivel de base de datos es?
    $archivo = $_FILES['archivo']['name'];
    $archivoCopiado = $_FILES['archivo']['tmp_name'];
    $entidadUniverso = "../archivos/educacionSuperior/JES/prueba".$archivo; //aqui asignamos el nombre y la ruta dependiendo de la opcion que se haya elegido
    $comprobarCopia = copy($archivoCopiado, $entidadUniverso);

    if ($comprobarCopia) {
        $universoArray = universoArray($entidadUniverso);
        $regionArray = new Region($universoArray);
        $municipioArray = new Municipio($universoArray);
        $localidadArray = new Localidad($universoArray);
        $escuelaArray = new Escuela($universoArray);
        $becarioArray = new Becario($universoArray);

        $arrayRegion = $regionArray->regionFinal();
        $arrayMunicipio = $municipioArray->municipioFinal();
        $arrayLocaliad = $localidadArray->localidadFinal();
        $arrayEscuela = $escuelaArray->escuelaFinal();
        $arrayBecario = $becarioArray->becarioFinal();
        //echo "<pre>";
        //print_r($arrayBecario);
        //echo "<pre>";

    } else {
      echo "No se ha realizado la copia";
    }

}
 ?>
