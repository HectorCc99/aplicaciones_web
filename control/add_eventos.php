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

    $result= insertarEvento($id_admin, $lugar, $material,$id_recurso2,$id_recurso3,  $evento, $descrip,  $encargado, $telefono,
                        $cantidad,$cantrec2,$cantrec3, 1, $finicio,  $fcierre, $hinicio, $hcierre, $sem, $nombreArchivo, $Archivo);

    if($result){
        header('Location: ../admin-eventos.php ');
    }
} else{
    echo "error al enviar el archivo";
}

 