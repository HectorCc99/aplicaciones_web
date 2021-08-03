<?php

function agregarArchivo($id_usuario,$nombre_archivo,$semestre,$tipo_ar,$Archivo){
    // `estatus_aprobado`, `tipo_archivo`
    include_once "../model/archivos.php";
    $obj_archivos = new archivos();
    $obj_archivos->setIdUsuario($id_usuario);
    $obj_archivos->setNombreArchivo($nombre_archivo);
    $obj_archivos->setSemestre($semestre);
    $obj_archivos->getEstatusAprobado(0);
    $obj_archivos->setTipoArchivo($tipo_ar);
    //subri el archivo
    $resultado=$obj_archivos->subir_Archivo($id_usuario,$nombre_archivo,$Archivo);
    if($resultado!=false){
        $obj_archivos->setPathArchivo($resultado);
        return $obj_archivos->agregar_documentos();
    }

}

function eliminar_archivo($id_alumno){
    include_once "../model/archivos.php";
    $obj_archivos = new archivos();
    $obj_archivos->setIdUsuario($id_alumno);
    //subri el archivo
    $resultado=$obj_archivos->eliminararchivopath();
    if($resultado==true){
        return $obj_archivos->eliminararchivoBD();
    }
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

function archivosAlumno($id,$estatus){
    include_once "../model/archivos.php";
    $obj_archivos = new archivos();
    $obj_archivos->setIdUsuario($id);
    $result=$obj_archivos->consultadocumentosUsuario($estatus);
    $data=json_encode($result);
    return$data;
}

function modificaestadoarchivo($id_usuario,$id_archivo,$notas,$estatus,$id_admin){
    include_once "../model/archivos.php";
    $obj_archivos = new archivos();
    $obj_archivos->setIdUsuario($id_usuario);
    $obj_archivos->setIdArchivo($id_archivo);
    $obj_archivos->setNotas($notas);
    $obj_archivos->setIdAdmin($id_admin);
    $obj_archivos->setEstatusAprobado($estatus);
    return $obj_archivos->ModificaEstatusARchivo();
}

function revisarEstadoDocAlumno($id){
    include_once "../model/archivos.php";
    $obj_archivos = new archivos();
    $obj_archivos->setIdUsuario($id);
    $result = $obj_archivos->verEstadoDocAlumno();
    $data=json_encode($result);
    return$data;
}
function estatusCredencial($id){
    include_once "../model/archivos.php";
    $obj_archivos = new archivos();
    $obj_archivos->setIdUsuario($id);
    $result = $obj_archivos->estatusCredencial();
    $data=json_encode($result);
    return$data;
}
function archivosAceptados($id){
    include_once "../model/archivos.php";
    $obj_archivos = new archivos();
    $obj_archivos->setIdUsuario($id);
    $result = $obj_archivos->archivosAceptados();
    $data=json_encode($result);
    return$data;
}
//echo revisarEstadoDocAlumno(2);
