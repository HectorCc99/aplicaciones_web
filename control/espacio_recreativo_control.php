<?php

function agregarEspacio($nombre_espacio,$ubicacion,$tipo_area){
    include_once "../model/espacio_recreativo.php";
    $obj_espacioRecreativo= new espacio_recreativo();
    $obj_espacioRecreativo->setNombreEspacio($nombre_espacio);
    $obj_espacioRecreativo->setUbicacion($ubicacion);
    $obj_espacioRecreativo->setTipoArea($tipo_area);
    return $obj_espacioRecreativo->insertarEspacioRecreativo() ? "Registro realizado correctamente." : "Error a agregar el espacio recreativo.";
}
function modificarEspacio($id_espacio,$nombre_espacio,$ubicacion,$tipo_area){
    include_once "../model/espacio_recreativo.php";
    $obj_espacioRecreativo= new espacio_recreativo();
    $obj_espacioRecreativo->setIdEspacio($id_espacio);
    $obj_espacioRecreativo->setNombreEspacio($nombre_espacio);
    $obj_espacioRecreativo->setUbicacion($ubicacion);
    $obj_espacioRecreativo->setTipoArea($tipo_area);
    return $obj_espacioRecreativo->modificarEspacioRecreativo() ? "Modificación realizado correctamente." : "Error a modificar el espacio recreativo.";
}
function buscarEspacio($id_espacio){
    include_once "../model/espacio_recreativo.php";
    $obj_espacioRecreativo= new espacio_recreativo();
    $result = $obj_espacioRecreativo->buscarEspacioRecreativo($id_espacio);
    $jason_data = json_encode($result);
    return $jason_data;
}
function eliminarEspacio($id_espacio){
    include_once "../model/espacio_recreativo.php";
    $obj_espacioRecreativo= new espacio_recreativo();
    $obj_espacioRecreativo->setIdEspacio($id_espacio);
    return $obj_espacioRecreativo->eliminarEspacioRecreativo() ? "Espacio Recreativo eliminado correctamente" : "Error a eliminar registro";
}
function listaEspacio(){
    include_once "../model/espacio_recreativo.php";
    $obj_espacioRecreativo= new espacio_recreativo();
    $result = $obj_espacioRecreativo->listarEspacioRecreativo();
    $jason_data = json_encode($result);
    return $jason_data;
}
function prestamos_espacio($id_espacio){
    include_once "../model/espacio_recreativo.php";
    $obj_prestamo= new espacio_recreativo();
    $result=$obj_prestamo->prestamosEspacio($id_espacio);
    $jason_data=json_encode($result);
    return $jason_data;
}

function cambia_estatus_prestamo($id_prestamo,$estatus){
    include_once "../model/espacio_recreativo.php";
    $obj_espacioRecreativo= new espacio_recreativo();
    return $obj_espacioRecreativo->modifica_estatus_prestamo($id_prestamo,$estatus) ? "Estatus cambiado correctamente" : "Error a cambiar estatus";

}