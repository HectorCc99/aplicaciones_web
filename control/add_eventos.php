<?php

if(/*isset($_POST['evento']) && isset($_POST['encargado']) && isset($_POST['telefonoEv']) && isset($_POST['semEv']) && isset($_POST['lugarEv'])
    && isset($_POST['materialEv'])&& isset($_POST['cantidadEv']) && isset($_POST['descripcionEv']) && isset($_POST['fecha_inicio'])
    && isset($_POST['fecha_cierre']) && isset($_POST['hora_inicio']) && isset($_POST['hora_cierre']) &&*/ isset($_FILES['poster'])){

    include_once "eventos_control.php";
    $evento =$_POST['evento'];
    $encargado =$_POST['encargado'];
    $telefono =$_POST['telefonoEv'];
    $sem =$_POST['semEv'];
    $lugar =$_POST['lugarEv'];
    $material =$_POST['materialEv'];
    $cantidad =$_POST['cantidadEv'];
    $descrip = $_POST['descripcionEv'];
    $finicio =$_POST['fecha_inicio'];
    $fcierre =$_POST['fecha_cierre'];
    $hinicio = $_POST['hora_inicio'];
    $hcierre =$_POST['hora_cierre'];
    $id_admin = 1; //Dato temporal, Se tomara cuando se trabaje con sesiones?

    $nombreArchivo = $_FILES['poster']['name'];
    $Archivo = $_FILES['poster']['tmp_name'];

    $result= insertarEvento($id_admin, $lugar, $material,  $evento, $descrip,  $encargado, $telefono,
                        $cantidad, 1, $finicio,  $fcierre, $hinicio, $hcierre, $sem, $nombreArchivo, $Archivo);

    echo $result;
} else{
    echo "error al enviar el archivo";
}

 