<?php

function agregarArchivo(){

}

function eliminar_archivo(){

}

function consultaArchivosP(){
    include_once "../model/archivos.php";
    $obj_archivos = new archivos();
    $result=$obj_archivos->consultadocumentosp();
    $data=json_encode($result);
    return$data;
}

function consultaArchivosR(){
    include_once "../model/archivos.php";
    $obj_archivos = new archivos();
    $result=$obj_archivos->consultadocumentosr();
    $data=json_encode($result);
    return$data;
}

function consultaArchivos(){
    include_once "../model/archivos.php";
    $obj_archivos = new archivos();
    $result=$obj_archivos->consultadocumentos();
    $data=json_encode($result);
    return$data;
}

function archivosAlumno($id){
    include_once "../model/archivos.php";
    $obj_archivos = new archivos();
    $obj_archivos->setIdUsuario($id);
    $result=$obj_archivos->consultadocumentosUsuario();
    $data=json_encode($result);
    return$data;
}