<?php
if(isset($_POST['filtro'])){
    $filtro=$_POST['filtro'];
    include_once "grupos_control.php";
    echo listaGrupos($filtro);
}
