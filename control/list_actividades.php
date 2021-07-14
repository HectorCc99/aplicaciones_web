<?php
if(isset($_POST['filtro'])){
    //0 todos , 1 activos 2 inactivos
    $filtro=$_POST['filtro'];
    include "../control/actividades_control.php";
    echo traeActividades($filtro);
}
