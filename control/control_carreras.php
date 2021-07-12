<?php

function getListaCarreras(){
    include "../model/carreras.php";
    $obj_carreras= new carreras();
    $result=$obj_carreras ->listacarreras();
    $json_data = json_encode($result);
    return $json_data;
}


function AgregaCarrera($nombre){
    include "../model/carreras.php";
    $obj_carreras= new carreras();
    $obj_carreras->setNombreCarrera($nombre);
    return $obj_carreras ->crearcarrera() ? "registro exitoso" :"Error al registrar carrera";
}
function EditaCarrera($id,$nombre){
    include "../model/carreras.php";
    $obj_carreras= new carreras();
    $obj_carreras->setNombreCarrera($nombre);
    $obj_carreras->setIdCarrera($id);
    return $obj_carreras ->modificarcarrera() ? "Se modifico con exitoso" :"Error al modificar carrera";
}

