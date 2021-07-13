<?php

// AGREGAR
function insertarEvento($id_admin, $id_espr, $id_recurso, $nombact, $descrip, $encargado, $telenc,
                        $semestreev, $cupoev, $imagen, $cantrec, $estatusev, $finicio, $ffin, $hinicio, $hfin,){
    include_once "../model/eventos.php";
    $obj_evento = new eventos();
    $obj_evento -> setIdAdministradorFk($id_admin);
    $obj_evento -> setIdEspacioRFk($id_espr);
    $obj_evento -> setIdRecursoFk($id_recurso);
    $obj_evento -> setNombreActividad($nombact);
    $obj_evento -> setDescripcion($descrip);
    $obj_evento -> setEncargado($encargado);
    $obj_evento -> setTelEncargado($telenc);
    $obj_evento -> setSemestreEv($semestreev);
    $obj_evento -> setCupoEv($cupoev);
    $obj_evento -> setImagen($imagen);
    $obj_evento -> setCantidadRecurso($cantrec);
    $obj_evento -> setEstatusEvento($estatusev); // CUANDO SE AGREGA UN REGISTRO TAMBIEN EL ESTATUS?
    $obj_evento -> setFechaInicio($finicio);
    $obj_evento -> setFechaFin($ffin);
    $obj_evento -> setHoraInicio($hinicio);
    $obj_evento -> setHoraFin($hfin);
    return $obj_evento->agregarEvento() ? "Exito" : "Fallo";
}
// echo insertarEvento(1,2,3,"Yoga chido", "Es chido", "Carlos", 552323, 2021-2,30, "ruta", 20, 1, 12, 13, 1300, 1400);


// MOSTRAR
function verEventos($filtro){ // PENDIENTE no aplica el filtro
    include_once "../model/eventos.php";
    $obj_evento = new eventos();
    $result = $obj_evento -> listaEventos($filtro);
    $data = json_encode($result);
    return $data;
}
// echo verEventos(1);

function detallesEvento($id){
    include_once "../model/eventos.php";
    $obj_evento = new eventos();
    $obj_evento ->setIdEvento($id);
    $result = $obj_evento->mostrarEvento();
    $data=json_encode($result);
    return $data;
}
// echo detallesEvento(1);


// MOSTRAR VISTA ADMIN - EVENTOS
function verEventosAdmin($filtro){ // PENDIENTE no aplica el filtro
    include_once "../model/eventos.php";
    $obj_evento = new eventos();
    $result = $obj_evento -> listaEventosAdmin($filtro);
    $data = json_encode($result);
    return $data;
}
// echo verEventosAdmin(1);

function detallesEventoAdmin($id){
    include_once "../model/eventos.php";
    $obj_evento = new eventos();
    $obj_evento ->setIdEvento($id);
    $result = $obj_evento->mostrarEventoAdmin();
    $data=json_encode($result);
    return $data;
}
//echo detallesEventoAdmin(1);


// MODIFICAR
function actualizarEvento($idev, $id_admin, $id_espr, $id_recurso, $nombact, $descrip,
                          $encargado, $telenc, $semestreev, $cupoev, $imagen, $cantrec,
                          $finicio, $ffin, $hinicio, $hfin){
    include_once "../model/eventos.php";
    $obj_evento = new eventos();
    $obj_evento ->setIdEvento($idev);
    $obj_evento -> setIdAdministradorFk($id_admin);
    $obj_evento -> setIdEspacioRFk($id_espr);
    $obj_evento -> setIdRecursoFk($id_recurso);
    $obj_evento -> setNombreActividad($nombact);
    $obj_evento -> setDescripcion($descrip);
    $obj_evento -> setEncargado($encargado);
    $obj_evento -> setTelEncargado($telenc);
    $obj_evento -> setSemestreEv($semestreev);
    $obj_evento -> setCupoEv($cupoev);
    $obj_evento -> setImagen($imagen);
    $obj_evento -> setCantidadRecurso($cantrec);
    $obj_evento -> setFechaInicio($finicio);
    $obj_evento -> setFechaFin($ffin);
    $obj_evento -> setHoraInicio($hinicio);
    $obj_evento -> setHoraFin($hfin);
    return $obj_evento -> modificarEvento() ? "Exito" : "Fallo";
}
//echo actualizarEvento(2, 1, 3, 1, "Extreme Yoga", "Yoga extremo", "Hector", "5562326282", 2022-1, 9, "ruta2", 5, 2021-12-12, 2021-12-13, 001400, 001600);

function cambiarEstatus($idev, $estatusev){
    include_once "../model/eventos.php";
    $obj_evento = new eventos();
    $obj_evento ->setIdEvento($idev);
    $obj_evento ->setEstatusEvento($estatusev);
    return $obj_evento ->estatusEvento() ? "Se cambio el estatus" : "error al cambiar el estatus";
}
// echo cambiarEstatus(2, 0);