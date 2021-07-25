<?php
if(isset($_POST['filtro'])) {
    $filtro = $_POST['filtro'];
    switch ($filtro){
        case "1":
            include_once "usuario_control.php";
            $id = $_POST['id_us_perfil'];
            echo detalles_usuario($id);
            break;
        case "2":
            include_once "usuario_control.php";
            if (isset($_POST['id_us_perfil'])){
                $id = $_POST['id_us_perfil'];
                $nombre=$_POST['nombreu'];
                $primer=$_POST['primer_apu'];
                $segundo=$_POST['segundo_apu'];
                $cuenta=$_POST['cuentau'];
                $carrera=$_POST['carrerau'];
                $email=$_POST['correou'];
                $tel=$_POST['telu'];
                echo editar_usuario($id,$nombre,$primer,$segundo,$cuenta,$carrera,$email,$tel);
            }
            break;
    }
}