<?php
if(isset($_POST['idAc'])){
    $id=$_POST['idAc'];
    include "../control/actividades_control.php";
    echo detallesActividadD($id);
}