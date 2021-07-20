<?php

if (isset($_POST['tipoBusqueda'])) {
    $tipoBusqueda=$_POST['tipoBusqueda'];
    switch ($tipoBusqueda){
        //Filtros 1: solo Material, 2: solo Fecha, 3:ambos
        case "1":
            include"prestamo_recurso_control.php";
            echo listaDevolucion();
            break;
        case "2":
            $id_prestamo=$_POST['id_prestamoV'];
            include "prestamo_recurso_control.php";
           echo buscarPrestamoMatPorId($id_prestamo);
            break;
        case "3":
            $id_prestamo=$_POST['id_prestamoV'];
            $notas=$_POST['notas'];
            $estatus=$_POST['estatus'];
            include "prestamo_control.php";
            if(modificarEstatusprestamo($estatus,$id_prestamo)) {
                echo modificarNotasPrestamo($id_prestamo, $notas);
            }
            break;
        default:
            include "prestamo_recurso_control.php";
            echo listaDevolucion();
            break;
    }
}
