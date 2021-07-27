<?php

if(isset($_FILES['imagen'])){
    include_once "actividades_control.php";
    $id_admin_alta=$_POST['id_admin_alta'];
    $Nombre2=$_POST['Nombre2'];
    $descripcion2=$_POST['descripcion2'];
    $tipos2=$_POST['tipos2'];

    $nombreArchivo = $_FILES['imagen']['name'];
    $Archivo = $_FILES['imagen']['tmp_name'];

    if(registroActividad($id_admin_alta,$Nombre2,$descripcion2,$tipos2,$nombreArchivo,$Archivo)){
        header('Location: ../activ_deportivas.php');
    }
} else{
    echo "error al enviar el archivo";
}

