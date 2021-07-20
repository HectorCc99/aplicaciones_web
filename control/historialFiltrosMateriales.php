<?php

if (isset($_POST['tipoFiltroV']) && isset($_POST['id_MaterialV']) && isset($_POST['fechaMaterialV'])){
    $tipofiltro=$_POST['tipoFiltroV'];
    $id_material=$_POST['id_MaterialV'];
    $fechaPrestamo=$_POST['fechaMaterialV'];
    $filtro='2';

    switch ($tipofiltro){
        //Filtros 1: solo Material, 2: solo Fecha, 3:ambos
        case "1":
            include "prestamo_recurso_control.php";
            echo filtroPorMaterial($filtro,$id_material);
            break;
        case "2":
            include"prestamo_recurso_control.php";
            echo filtroPorFecha($filtro,$fechaPrestamo);
            break;
        case "3":
            include "prestamo_recurso_control.php";
            echo filtroPorMaterialYFecha($filtro,$id_material,$fechaPrestamo);
            break;
        default:
            include "prestamo_recurso_control.php";
            echo historialPrestamoRecurso();
            break;
    }
}