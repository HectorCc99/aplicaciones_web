<?php
if(isset($_POST['filtro'])){
    //0 todos , 1 activos 2 inactivos
    $filtro=$_POST['filtro'];
    if(isset($_POST['tipo'])){
        $tipo=$_POST['tipo'];
    }else{
        $tipo=0;
    }

    include "../control/actividades_control.php";
    echo traeActividades($filtro,$tipo);
}
