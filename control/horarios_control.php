<?php
function Agregar_Horario($lunes,$martes,$miercoles,$jueves,$viernes){
    include_once "../model/horarios.php";
    $obj_horarios = new horarios();
    $obj_horarios->setLunes($lunes);
    $obj_horarios->setMartes($martes);
    $obj_horarios->setMiercoles($miercoles);
    $obj_horarios->setJueves($jueves);
    $obj_horarios->setViernes($viernes);
    return $obj_horarios->agregarHorario() ? "Se registró con exito" : "Error al registrar";
}


function ListaHorarios(){
    include_once "../model/horarios.php";
    $obj_horarios = new horarios();
    $result=$obj_horarios->mostrarHorarios();
    $data=json_encode($result);
    return$data;
}


function modiciaHorario($id,$lunes,$martes,$miercoles,$jueves,$viernes){
    include_once "../model/horarios.php";
    $obj_horarios= new horarios();
    $obj_horarios->setIdHorario($id);
    $obj_horarios->setLunes($lunes);
    $obj_horarios->setMartes($martes);
    $obj_horarios->setMiercoles($miercoles);
    $obj_horarios->setJueves($jueves);
    $obj_horarios->setViernes($viernes);
    return $obj_horarios->modificarHorario() ? "Se modifico con exito" : "Error al modificar";

}


function eliminar_horario($id){
    include_once "../model/horarios.php";
    $obj_horarios= new horarios();
    $obj_horarios->setIdHorario($id);
    return $obj_horarios-> borrarHorario() ? "Se elimno con exito" : "Error al eliminar";

}
