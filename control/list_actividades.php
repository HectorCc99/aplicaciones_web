<?php
if(isset($_POST['filtro'])){
    $filtro=$_POST['filtro'];
    include "../control/actividades_control.php";
    echo traeActividades($filtro);
}
