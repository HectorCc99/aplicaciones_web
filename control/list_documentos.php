<?php
// recibimos el filtro por post
$filtro=$_POST['filtro'];
// creo un switch para el filtro
switch ($filtro){
    // 1 pendientes
    case "1":
        //incluyo el control al que le voy a enviar el filtro
        include_once "archivos_control.php";
        echo consultaArchivosP();
        break;
        //2 revisados
    case "2":
        //incluyo el control al que le voy a enviar el filtro
        include_once "archivos_control.php";
        echo consultaArchivosR();
        break;
        //3 archivos usuario
    case "3":
        include_once "archivos_control.php";
        $id=$_POST['id'];
        $estatus=$_POST['estatus'];
        echo archivosAlumno($id,$estatus);
        break;
    default:
        //incluyo el control al que le voy a enviar el filtro
        include_once "archivos_control.php";
        echo consultaArchivos();
        break;
}
//incluyo el control al que le voy a enviar el filtro
