<?php
if(isset($_POST['id']) && isset($_POST['estatus_c'])){
    $id=$_POST['id'];
    $estatus_c=$_POST['estatus_c'];
    include_once "grupos_control.php";
    echo cambia_estatus($id,$estatus_c);
}