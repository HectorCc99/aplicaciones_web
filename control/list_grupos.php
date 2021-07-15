<?php
if (isset($_POST['filtro']) && isset($_POST['idGrupo'])){
    $filtro=$_POST['filtro'];
    $id_grupo=$_POST['idGrupo'];
    switch ($filtro){
        // 0 todos, 1 de una actividad
        case "1":
            include_once "grupos_control.php";
            echo listaGruposdeunaActividad($id_grupo);
            break;
        default:
            include_once "grupos_control.php";
            echo listaGrupos();
            break;
    }
}