<?php
$id=$_POST['id'];
$estatus=$_POST['estatus'];
include_once "espacio_recreativo_control.php";
echo cambia_estatus_prestamo($id,$estatus);