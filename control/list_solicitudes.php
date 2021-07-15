<?php

if (isset($_POST['deporte']) && isset($_POST['grupo'])){
    $id_d=$_POST['deporte'];
    $id_g=$_POST['grupo'];
    include_once "usuario_act_control.php";
    echo versolicitudes($id_d,$id_g);
}
