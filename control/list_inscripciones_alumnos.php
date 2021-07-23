<?php
if(isset($_POST['filtro'])) {
    $filtro = $_POST['filtro'];
    switch ($filtro){
        case "1":
            include_once "usuario_act_control.php";
            $id = $_POST['id_usuario'];
            echo historialInscripcionesUsuario($id);
            break;
        case "2":
            include_once "usuario_act_control.php";
            $id = $_POST['id_usuario'];
            echo inscripcionesActuales($id);
            break;
        case "3":
            include_once "archivos_control.php";
            $id = $_POST['id_usuario'];
            echo revisarEstadoDocAlumno($id);
            break;
    }
}