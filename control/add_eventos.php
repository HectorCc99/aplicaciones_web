<?php

if(isset($_FILES['poster'])){

    include_once "eventos_control.php";
    $evento =$_POST['evento'];
    $encargado =$_POST['encargado'];
    $telefono =$_POST['telefonoEv'];
    $sem =$_POST['semEv'];
    $lugar =$_POST['lugarEv'];
    if(isset($_POST['materialEv'])){
        $material =$_POST['materialEv'];
        $cantidad =$_POST['cantidadEv'];
    }else{
        $material="";
        $cantidad="";
    }
   
    if(isset($_POST['materialEv2'])){
    $id_recurso2=$_POST['materialEv2'];
        $cantrec2=$_POST['cantidadEv2'];
    }else{
        $id_recurso2="";
        $cantrec2="";
    }
    if (isset($_POST['materialEv3'])) {
        $id_recurso3 = $_POST['materialEv3'];
        $cantrec3 =$_POST['cantidadEv3'];
    }else{
        $id_recurso3="";
        $cantrec3="";
    }
    $descrip = $_POST['descripcionEv'];
    $finicio =$_POST['fecha_inicio'];
    $fcierre =$_POST['fecha_cierre'];
    $hinicio = $_POST['hora_inicio'];
    $hcierre =$_POST['hora_cierre'];
    $id_admin = $_POST['id_admin']; //Dato temporal, Se tomara cuando se trabaje con sesiones?

    $nombreArchivo = $_FILES['poster']['name'];
    $Archivo = $_FILES['poster']['tmp_name'];

    insertarEvento($id_admin, $lugar, $material,$id_recurso2,$id_recurso3,  $evento, $descrip,  $encargado, $telefono,
                        $cantidad,$cantrec2,$cantrec3, 1, $finicio,  $fcierre, $hinicio, $hcierre, $sem, $nombreArchivo, $Archivo);
                            echo "<script> alert('Evento registrado con exito'); window.location = '../admin-eventos.php'; </script>";
    
    
} else{
    echo "error al enviar el archivo";
}

 