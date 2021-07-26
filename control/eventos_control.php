<?php

// AGREGAR
function insertarEvento($id_admin, $id_espr, $id_recurso,$id_recurso2,$id_recurso3, $nombact, $descrip, $encargado, $telenc,
                        $cantrec,$cantrec2,$cantrec3, $estatusev, $finicio, $ffin, $hinicio, $hfin,$semestreev, $nombre_archivo, $Archivo){
    include_once "../model/eventos.php";
    $obj_evento = new eventos();
    $obj_evento -> setIdAdministradorFk($id_admin);
    $obj_evento -> setIdEspacioRFk($id_espr);
    $obj_evento -> setIdRecursoFk($id_recurso);
    $obj_evento -> setNombreActividad($nombact);
    $obj_evento -> setDescripcion($descrip);
    $obj_evento -> setEncargado($encargado);
    $obj_evento -> setTelEncargado($telenc);
    $obj_evento -> setCantidadRecurso($cantrec);
    $obj_evento -> setEstatusEvento($estatusev);
    $obj_evento -> setFechaInicio($finicio);
    $obj_evento -> setFechaFin($ffin);
    $obj_evento -> setHoraInicio($hinicio);
    $obj_evento -> setHoraFin($hfin);
    $obj_evento -> setSemestreEv($semestreev);
    //subir la imagen
    $resultado = $obj_evento->subirPoster($nombre_archivo,$Archivo);
    if($resultado!=false){
        $obj_evento->setImagen($resultado);
        if ($id=$obj_evento->agregarEvento()) {
            $obj_evento->insertarRecursoEvento($id_recurso, $id, $cantrec);
            if(!Empty($cantrec2)){
                $obj_evento->insertarRecursoEvento($id_recurso2, $id, $cantrec);
            }
            if (!empty($cantrec3)){
                $obj_evento->insertarRecursoEvento($id_recurso3, $id, $cantrec);
            }
        }
    }
}
//echo insertarEvento(1,2,3,"Yoga chido", "Es chido", "Carlos", 552323, "ruta",30, 1, 20210603, 2021-06-04, 12, 13, 2022-2);


// MOSTRAR
function verEventos($filtro){
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


// MODIFICAR
function actualizarEvento($idev, $id_admin, $id_espr, $id_recurso, $nombact, $descrip,
                          $encargado, $telenc, $cantrec,
                          $finicio, $ffin, $hinicio, $hfin, $semestreev, $nombre_archivo, $Archivo){
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
    $obj_evento -> setCantidadRecurso($cantrec);
    $obj_evento -> setFechaInicio($finicio);
    $obj_evento -> setFechaFin($ffin);
    $obj_evento -> setHoraInicio($hinicio);
    $obj_evento -> setHoraFin($hfin);
    $obj_evento -> setSemestreEv($semestreev);
    //subir la imagen
    $resultado = $obj_evento->subirPoster($nombre_archivo,$Archivo);
    if($resultado!=false){
        $obj_evento->setImagen($resultado);
        return $obj_evento -> modificarEvento();
    }
}
//echo actualizarEvento(3, 1, 3, 1, "Extreme Yoga", "Yoga extremo", "Hector", "5562326282",  "ruta2", 5, "2021-12-12", "2021-12-13", "001400", "001600","2022-1");


function cambiarEstatus($idev, $estatusev){
    include_once "../model/eventos.php";
    $obj_evento = new eventos();
    $obj_evento ->setIdEvento($idev);
    $obj_evento ->setEstatusEvento($estatusev);
    return $obj_evento ->estatusEvento() ? "Se cambio el estatus" : "error al cambiar el estatus";
}
// echo cambiarEstatus(2, 0);


// ELIMINAR
function eliminarEvento($id){
    include_once "../model/eventos.php";
    $obj_recurso = new eventos();
    $obj_recurso -> setIdEvento($id);
    return $obj_recurso -> borrarEvento() ? "Eliminado con exito" : "Fallo al eliminar";
}
// echo eliminarEvento(3);
//DETALLES EVENTOS PRÓXIMOS
function listarProximosEventos(){
    include_once "../model/eventos.php";
    $obj_evento = new eventos();
    $result = $obj_evento->listarProximosEventos();
    $data=json_encode($result);
    return $data;
}