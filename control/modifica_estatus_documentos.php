<?php
    $id_usuario=$_POST['id_usuario'];
    $id_archivo=$_POST['id_archivo'];
    $notas=$_POST['notas'];
    $estatus=$_POST['estatus'];
    include_once "archivos_control.php";
    echo modificaestadoarchivo($id_usuario,$id_archivo,$notas,$estatus);