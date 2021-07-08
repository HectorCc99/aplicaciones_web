<?php
if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['tipo'])){
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $des=$_POST['descripcion'];
    $tipo=$_POST['tipo'];
   include_once "actividades_control.php";
    echo modificaActividad($id,$nombre,$des,$tipo);
}