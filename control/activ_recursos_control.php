<?php

// AGREGAR
function registroActRec($id_act,$id_Rec,$cantidad,){
    include_once "../model/actividad_recursos.php";
    $obj_RecAct = new actividad_recursos();
    $obj_RecAct-> setIdActividadFk($id_act);
    $obj_RecAct-> setIdRecursoFk($id_Rec);
    $obj_RecAct->setCantidad($cantidad);
    //$obj_RecAct->setNotas($notas); las notas son aparte
    return $obj_RecAct->agregarActividadRecursos() ? "Se registro con exito": "no pudimos registrar";
}
// echo registroActRec(2, 2, 20);


// MOSTRAR
function verListaRecursos(){
    include_once "../model/actividad_recursos.php";
    $obj_recurso = new actividad_recursos();
    $resultado =$obj_recurso->mostrarListaActividadRecursos() ;
    $datos=json_encode($resultado);
    return $datos;
}
// echo verListaRecursos();

function detallesRegistroRecursos($id){
    include_once "../model/actividad_recursos.php";
    $obj_recurso = new actividad_recursos();
    $obj_recurso -> setIdActividadRecurso($id);
    $result = $obj_recurso->mostrarRecursodeActividad();
    $data = json_encode($result);
    return $data;
}
// echo detallesRegistroRecursos(2);


// MODIFICAR
function actualizarActividadRecurso($id, $id_act, $id_rec, $cantidad){
    include_once "../model/actividad_recursos.php";
    $obj_recurso = new actividad_recursos();
    $obj_recurso -> setIdActividadRecurso($id);
    $obj_recurso -> setIdActividadFk($id_act);
    $obj_recurso -> setIdRecursoFk($id_rec);
    $obj_recurso -> setCantidad($cantidad);
    return $obj_recurso -> modificarActividadRecursos() ? "Modificacion Exitosa" : "Error al modificar";
}
// echo actualizarActividadRecurso(2, 1, 1, 31);

function ponerNota($id, $nota){
    include_once "../model/actividad_recursos.php";
    $obj_recurso = new actividad_recursos();
    $obj_recurso -> setIdActividadRecurso($id);
    $obj_recurso -> setNotas($nota);
    return $obj_recurso -> agregarNotas() ? "Modificacion Exitosa" : "Error al modificar";
}
// echo  ponerNota(2, "En mal estado");
