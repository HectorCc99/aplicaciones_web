<?php

function  crear_asignacion($id_u,$id_act,$asistencia,$año){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $obj_usuario->setIdUsuario($id_u);
    $obj_usuario->setIdActividad($id_act);
    $obj_usuario->setAsistencia($asistencia);
    $obj_usuario->setAño($año);
    return $obj_usuario->crearinscripcion() ? "Registro exitoso" : "falla al registrar";
}

//echo crear_asignacion(1,1,0,'2022-1');

function  editar_asistencia($id_u,$id_act,$asistencia,$año){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $obj_usuario->setIdUsuario($id_u);
    $obj_usuario->setIdActividad($id_act);
    $obj_usuario->setAsistencia($asistencia);
    $obj_usuario->setAño($año);
    return $obj_usuario->cambiar_asistencia() ? "Modificacion exitosa" : "falla al modificar";
}
//echo editar_asistencia(1,1,1,"2022-1");

function  eliminar_asignacion($id_u,$id_act,$año){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $obj_usuario->setIdUsuario($id_u);
    $obj_usuario->setIdActividad($id_act);
    $obj_usuario->setAño($año);
    return $obj_usuario->borrarinscripcion() ? "Eliminacion exitosa" : "falla al eliminar";
}
//echo eliminar_asignacion(1,1,'2022-1');

function  ver_asignaciones($id_u,$id_act,$año){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $result= $obj_usuario->verinscripciones() ;
    $data=json_encode($result);
    return $data;
}
//echo ver_asignaciones(1,1,"2022-1");

function  detalles_asignacion($id_u,$id_act,$año){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $obj_usuario->setIdUsuario($id_u);
    $obj_usuario->setAño($año);
    $obj_usuario->setIdActividad($id_act);
    $result= $obj_usuario->detallesinscripcion() ;
    $data=json_encode($result);
    return $data;
}
//echo detalles_asignacion(1,1,'2022-1');