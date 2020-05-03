<?php
require_once '../librerias/arrays/universoArray.php';
require_once '../librerias/arrays/classRegion.php';
require_once '../librerias/arrays/classMunicipio.php';
require_once '../librerias/arrays/classLocalidad.php';
require_once '../librerias/arrays/classEscuela.php';
require_once '../librerias/arrays/classBecario.php';
require_once '../modelos/classRegion.php';
require_once '../modelos/classMunicipio.php';
require_once '../modelos/classLocalidad.php';
require_once '../modelos/classEscuela.php';
require_once '../modelos/classBecario.php';

  if (isset($_POST["subir"])) { // ¿Que nivel de base de datos es?
    $archivo = $_FILES['archivo']['name'];
    $archivoCopiado = $_FILES['archivo']['tmp_name'];
    $entidadUniverso = "../data/educacionSuperior/JES/prueba".$archivo; //aqui asignamos el nombre y la ruta dependiendo de la opcion que se haya elegido
    $comprobarCopia = copy($archivoCopiado, $entidadUniverso);

    if ($comprobarCopia) {
        $universoArray = universoArray($entidadUniverso);

        $regionArray = new Region($universoArray);
        $arrayRegion = $regionArray->regionFinal();
        $municipioArray = new Municipio($universoArray);
        $arrayMunicipio = $municipioArray->municipioFinal();
        $localidadArray = new Localidad($universoArray);
        $arrayLocaliad = $localidadArray->localidadFinal();
        $escuelaArray = new Escuela($universoArray);
        $arrayEscuela = $escuelaArray->escuelaFinal();
        $becarioArray = new Becario($universoArray);
        $arrayBecario = $becarioArray->becarioFinal();


                $regionModel = new RegionModel();
                $municipioModel = new MunicipioModel();
                $localidadModel = new LocalidadModel();
                $escuelaModel = new EscuelaModel();
                $becarioModel = new BecarioModel();
                $regionModel->consulta($arrayRegion);
                $municipioModel->consulta($arrayMunicipio);
                $localidadModel->consulta($arrayLocaliad);
                $escuelaModel->consulta($arrayEscuela);
                $becarioModel->consulta($arrayBecario);

        //echo "<pre>";
        //print_r($arrayBecario);
        //echo "<pre>";
    } else {
      echo "No se ha realizado la copia";
    }

}
 ?>
