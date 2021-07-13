<?php

// AGREGAR
function insertarRecursos($nombre_recurso, $cantidad){
    include_once "../model/recurso_recreativo.php";
    $obj_recurso = new recurso_recreativo();
    $obj_recurso -> setNombreRecurso($nombre_recurso);
    $obj_recurso->setCantidad($cantidad);
    return $obj_recurso->agregarRecurso() ? "Se agregó con exito":"No se pudo agregar";
}
// echo insertarRecursos("Pelota de Beisbol", 25);


// MOSTRAR
function verRecursos(){
    include_once "../model/recurso_recreativo.php";
    $obj_recurso = new recurso_recreativo();
    $resultado =$obj_recurso->mostrarRecursos();
    $data=json_encode($resultado);
    return $data;
}
// echo verRecursos();

function detallesRecurso($id){
    include_once "../model/recurso_recreativo.php";
    $obj_recurso = new recurso_recreativo();
    $obj_recurso -> setIdRecurso($id);
    $result = $obj_recurso -> mostrarRecurso();
    $data = json_encode($result);
    return $data;
}
// echo detallesRecurso(1);


// MODIFICAR
function actualizarRecurso($id, $nombre, $cantidad){
    include_once "../model/recurso_recreativo.php";
    $obj_recurso = new recurso_recreativo();
    $obj_recurso -> setIdRecurso($id);
    $obj_recurso -> setNombreRecurso($nombre);
    $obj_recurso -> setCantidad($cantidad);
    return $obj_recurso -> modificarRecurso() ? "Modificado con exito" : "Fallo al modificar";
}
// echo actualizarRecurso(5, "Balón de futbol", 5);


// ELIMINAR
function eliminarRecurso($id){
    include_once "../model/recurso_recreativo.php";
    $obj_recurso = new recurso_recreativo();
    $obj_recurso -> setIdRecurso($id);
    return $obj_recurso -> borrarRecurso() ? "Eliminado con exito" : "Fallo al eliminar";
}
// echo eliminarRecurso(5);