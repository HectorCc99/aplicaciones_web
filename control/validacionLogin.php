<?php
if (isset($_POST['tipoSesion']) && isset($_POST['id_usuario'])) {
    $tipoSesion=$_POST['tipoSesion'];
    switch ($tipoSesion){
        case "1":
           $id_admin=$_POST['id_usuario'];
            session_start();
            $_SESSION['id_Admin']=$id_admin;
            // header('Location: admin-menu.php');
            break;
        case "2":
            $idUsuario=$_POST['id_usuario'];
            session_start();
            $_SESSION['id_usuario']=$idUsuario;

            break;
        default:

            break;

    }
}