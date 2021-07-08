<?php
if (isset($_POST['id']) && isset($_POST['estatus_c']) ){
    $id=$_POST['id'];
    $estatus=$_POST['estatus_c'];
    include_once "actividades_control.php";
    echo CambiaEstatus($id,$estatus);
}