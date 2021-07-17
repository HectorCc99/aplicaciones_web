<?php

if (isset($_POST['id']) && isset($_POST['estatus_cambio'])){
    $id=$_POST['id'];
    $estatus_c=$_POST['estatus_cambio'];
    include_once "eventos_control.php";
    echo cambiarEstatus($id, $estatus_c);
}