<?php

if(isset($_POST['filtro'])) {
    $filtro = $_POST['filtro'];
    switch ($filtro){
        case "1":
            include_once "usuario_control.php";
            $id = $_POST['id_usuario'];
            echo historialPrestMat($id);
            break;
        case "2":
            include_once "usuario_control.php";
            $id = $_POST['id_usuario'];
            echo historialPrestArea($id);
            break;
    }
}
