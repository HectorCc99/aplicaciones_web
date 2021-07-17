<?php
if(isset($_POST['filtro'])){
    //0 todos , 1 activos 2 inactivos
    $filtro=$_POST['filtro'];
    include "eventos_control.php";
    echo verEventos($filtro);
}