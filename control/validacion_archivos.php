<?php
if(isset($_POST['filtro'])){
    $filtro=$_POST['filtro'];
    switch ($filtro){
        case "1":
            $id_usuario = $_POST['id_alumno'];
            include "archivos_control.php";
            echo estatusCredencial($id_usuario);
            break;
        case "2":
            $id_usuario = $_POST['id_alumno'];
            include "archivos_control.php";
            echo archivosAceptados($id_usuario);

            break;
        default:

            break;

    }


}