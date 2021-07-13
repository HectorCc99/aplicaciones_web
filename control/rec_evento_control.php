<?php

// AGREGAR
function insertarRecursoEvento($id_recurso, $id_evento, $cantidad){
    include_once "../model/recurso_evento.php";
    $obj_revento = new recurso_evento();
    $obj_revento -> setIdRecurso($id_recurso);
    $obj_revento -> setIdEventoPkfk($id_evento);
    $obj_revento -> setCantidad($cantidad);
    return $obj_revento -> agregarRecursoEvento() ? "Se agrego con exito" : "Fallo al agregar";
}
// echo insertarRecursoEvento(2, 1, 25);


// MOSTRAR
function listaRecursosEventos(){
    include_once "../model/recurso_evento.php";
    $obj_revento = new recurso_evento();
    $result = $obj_revento -> mostrarRecursosEventos();
    $data = json_encode($result);
    return $data;
}
// echo listaRecursosEventos();

function detallesRecursoEvento($id){
    include_once "../model/recurso_evento.php";
    $obj_revento = new recurso_evento();
    $obj_revento -> setIdRecurso($id);
    $result = $obj_revento -> mostrarRecursoEvento();
    $data = json_encode($result);
    return $data;
}
// echo detallesRecursoEvento(3);


//MODIFICAR
function actualizarRecursoEvento($id_recurso,$id_ev,$cantidad){
    include_once "../model/recurso_evento.php";
    $obj_revento = new recurso_evento();
    $obj_revento -> setIdRecurso($id_recurso);
    $obj_revento -> setIdEventoPkfk($id_ev);
    $obj_revento -> setCantidad($cantidad);
    return $obj_revento -> modificarRecursoEvento() ? "Actualizado" : "Fallo al actualizar";
}
// echo actualizarRecursoEvento(2, 12);

function ponerNotaRE($id_recurso,$nota){
    include_once "../model/recurso_evento.php";
    $obj_revento = new recurso_evento();
    $obj_revento -> setIdRecurso($id_recurso);
    $obj_revento -> setNotas($nota);
    return $obj_revento -> agregarNotasRE() ? "Nota agregada" : "Fallo en la nota";
}
//echo ponerNotaRE(2, "A ver.");


// ELIMINAR
function eliminarRecursoEvento($id_recurso){
    include_once "../model/recurso_evento.php";
    $obj_revento = new recurso_evento();
    $obj_revento -> setIdRecurso($id_recurso);
    return $obj_revento -> borrarRecursoEvento() ? "Se elimino" : "Fallo al eliminar";
}
//echo eliminarRecursoEvento(3);


