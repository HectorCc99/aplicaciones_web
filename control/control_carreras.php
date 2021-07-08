<?php

function getListaCarreras(){
    include "../model/carreras.php";
    $obj_carreras= new carreras();
    $result=$obj_carreras ->listacarreras();
    $json_data = json_encode($result);
    return $json_data;
}

