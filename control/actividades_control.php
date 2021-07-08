<?php
function traeActividades($filtro){
    // incluye un filtro
    // 0 todos, 1 activos, 2 inactivos
    include_once "../model/actividades_deportivas.php";
    $objAlumn = new actividades_deportivas();
    $result = $objAlumn->ListactividadDeport($filtro);
    $json_data = json_encode($result);
    return $json_data;
}
function detallesActividadD($id){

    include_once "../model/actividades_deportivas.php";
    $objAlumn = new actividades_deportivas();
    $result = $objAlumn->DetallesActividasd($id);
    $json_data = json_encode($result);
    return $json_data;
}
function listtipoact(){
    include_once "../model/tipo_actividad.php";
    $objAlumn = new tipo_actividad();
    $result = $objAlumn->listaTipoAc();
    $json_data = json_encode($result);
    return $json_data;
}
function registroActividad($id_admin,$nombre,$descripcion,$tipo){
    include_once "../model/actividades_deportivas.php";
    //`id_actividad`, `id_administrador`,`nombre_actividad`, `descripcion`, `fecha_creacion`, `tipo_actividad`, `estatus_actividad`
    $obj_actividad= new actividades_deportivas();
    $obj_actividad->setIdAdministradorFk($id_admin);
    $obj_actividad->setNombreAct($nombre);
    $obj_actividad->setDescripcion($descripcion);
    $obj_actividad->setTipoActividad($tipo);
    $obj_actividad->setEstatusActividad(1);
    return $obj_actividad->agregaActividadDepot()?"Se agregó correctamente la actividad":"No se pudo agregar la actividad";
}
function modificaActividad($id,$nombre,$descripcion,$tipo){
    include_once "../model/actividades_deportivas.php";
    $obj_actividad= new actividades_deportivas();
    $obj_actividad->setIdActividad($id);
    $obj_actividad->setNombreAct($nombre);
    $obj_actividad->setDescripcion($descripcion);
    $obj_actividad->setTipoActividad($tipo);
    return $obj_actividad->modificaActividad()?"Se modificó correctamente la actividad":"No se pudo modificar la actividad";
}
function CambiaEstatus($id_actividad,$estatus){
    include_once "../model/actividades_deportivas.php";

    $obj_actividad= new actividades_deportivas();
    $obj_actividad->setIdActividad($id_actividad);
    $obj_actividad->setEstatusActividad($estatus);
    return $obj_actividad->Estatus_actividad()?"Se modifico el estatus correctamente ":"No se pudo modificar el estatus";
}