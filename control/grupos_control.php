<?php
function listaGrupos(){
    include_once "../model/grupo.php";
    $obj_grupos= new grupo();
    $resultado= $obj_grupos->mostrarGrupos();
    $data=json_encode($resultado);
    return $data;
}
function DetallesGrupo($id){
    include_once "../model/grupo.php";
    $obj_grupos= new grupo();
    $obj_grupos->setIdGrupo($id);
    $resultado= $obj_grupos->mostrarGrupo();
    $data=json_encode($resultado);
    return $data;
}
function registra_grupo($id_act,$grupo,$cupo,$profesor,$espacio,$estatus_g,$horario,$semestre,$correo,$tel_prof){
    include_once "../model/grupo.php";
    $obj_grupos= new grupo();
    $obj_grupos->setIdActividad($id_act);
    $obj_grupos->setGrupo($grupo);
    $obj_grupos->setCupo($cupo);
    $obj_grupos->setProfesor($profesor);
    $obj_grupos->setIdEspacioFk($espacio);
    $obj_grupos->setEstatusGrupo($estatus_g);
    $obj_grupos->setIdHorarioFk($horario);
    $obj_grupos->setSemestre($semestre);
    $obj_grupos->setCorreo($correo);
    $obj_grupos->setTelProfesor($tel_prof);

    return $obj_grupos->agregarGrupo() ? "Registro Exitoso" : "Error registro";
}
function Actualiza_grupo($id_grupo,$id_act,$grupo,$cupo,$profesor,$espacio,$estatus_g,$horario,$semestre,$correo,$tel_prof){
    include_once "../model/grupo.php";
    $obj_grupos= new grupo();
    $obj_grupos->setIdGrupo($id_grupo);
    $obj_grupos->setIdActividad($id_act);
    $obj_grupos->setGrupo($grupo);
    $obj_grupos->setCupo($cupo);
    $obj_grupos->setProfesor($profesor);
    $obj_grupos->setIdEspacioFk($espacio);
    $obj_grupos->setEstatusGrupo($estatus_g);
    $obj_grupos->setIdHorarioFk($horario);
    $obj_grupos->setSemestre($semestre);
    $obj_grupos->setCorreo($correo);
    $obj_grupos->setTelProfesor($tel_prof);
    return $obj_grupos->modificarGrupo() ? "Modificacion Exitosa" : "Error al modificar";
}
function cambia_estatus($id_grupo,$estatus){
    include_once "../model/grupo.php";
    $obj_grupos= new grupo();
    $obj_grupos->setIdGrupo($id_grupo);
    $obj_grupos->setEstatusGrupo($estatus);
    return $obj_grupos->Estatus_Grupo()? "Se cambio el estatus" : "error al cambiar el estatus";

}