<?php
if(isset($_POST['filtro'])) {
    $filtro = $_POST['filtro'];
    switch ($filtro){
        case "1":
            include_once "administrador_control.php";
            $id = $_POST['id_ad_perfil'];
            echo detalles_usuarioAdmin($id);
            break;
        case "2":
            include_once "usuario_control.php";
            if (isset($_POST['id_usad'])){
                $id = $_POST['id_usad'];
                $nombre=$_POST['nombreA2'];
                $primer=$_POST['primer_apA2'];
                $segundo=$_POST['segundo_apA2'];
                $cuenta=$_POST['numtrab2'];
                $email=$_POST['correoA2'];
                $tel=$_POST['telA2'];
                echo editar_usuarioAdmin($id,$nombre,$primer,$segundo,$cuenta,$email,$tel);
            }
            break;
        case "3":
            $id = $_POST['id_us_perfil'];
            $pass = $_POST['contrasenia'];
            include_once "usuario_control.php";
            echo editar_contraAdmin($id,$pass);
            break;
    }
}