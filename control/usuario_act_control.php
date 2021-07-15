<?php

function versolicitudes($id_d,$id_g){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $result= $obj_usuario->verinscripcionesP($id_d,$id_g) ;
    $data=json_encode($result);
    return $data;
}

function verinscritos($id_d,$id_g){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $result= $obj_usuario->verinscripcionesA($id_d,$id_g) ;
    $data=json_encode($result);
    return $data;
}

function  crear_asignacion($id_in,$id_u,$id_act,$asistencia,$año){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $obj_usuario->setIdInscripcion($id_in);
    $obj_usuario->setIdUsuario($id_u);
    $obj_usuario->setIdActividad($id_act);
    $obj_usuario->setAsistencia($asistencia);
    $obj_usuario->setAño($año);
    $obj_usuario->setEstatusActividad(0);
    return $obj_usuario->crearinscripcion() ? "Registro exitoso" : "falla al registrar";
}

//echo crear_asignacion(1,1,0,'2022-1');

function  editar_asistencia($id,$asistencia){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $obj_usuario->setIdInscripcion($id);
    $obj_usuario->setAsistencia($asistencia);
    return $obj_usuario->cambiar_asistencia() ? "Modificacion exitosa" : "falla al modificar";
}

function  editar_estatus($id,$estatus){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $obj_usuario->setIdInscripcion($id);
    $obj_usuario->setEstatusActividad($estatus);
    return $obj_usuario->cambiar_estatus() ? "Modificacion exitosa" : "falla al modificar";
}
//echo editar_asistencia(1,1,1,"2022-1");

function  eliminar_asignacion($id){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $obj_usuario->setIdInscripcion($id);
    return $obj_usuario->borrarinscripcion() ? "Eliminacion exitosa" : "falla al eliminar";
}
//echo eliminar_asignacion(1,1,'2022-1');

function  ver_asignaciones(){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $result= $obj_usuario->verinscripciones() ;
    $data=json_encode($result);
    return $data;
}
//echo ver_asignaciones(1,1,"2022-1");

function  detalles_asignacion($id){
    include "../model/usuario_actividad.php";
    $obj_usuario= new usuario_actividad();
    $obj_usuario->setIdInscripcion($id);
    $result= $obj_usuario->detallesinscripcion() ;
    $data=json_encode($result);
    return $data;
}
//echo detalles_asignacion(1,1,'2022-1');