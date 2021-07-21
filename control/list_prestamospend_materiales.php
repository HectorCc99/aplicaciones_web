<?php
include_once "prestamo_recurso_control.php";
$id_recurso=$_POST['id'];
echo listaSolicitudes($id_recurso);