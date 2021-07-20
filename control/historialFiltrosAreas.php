<?php

if (isset($_POST['tipoFiltroVal']) && isset($_POST['id_AreaVal']) && isset($_POST['fechaAreaVal'])){
    $tipofiltro=$_POST['tipoFiltroVal'];
    $id_area=$_POST['id_AreaVal'];
    $fechaPrestamo=$_POST['fechaAreaVal'];
    $filtro='2';

    switch ($tipofiltro){
        //Filtros 1: solo Material, 2: solo Fecha, 3:ambos
        case "1":
            include "prestamo_espacio_control.php";
            echo filtroPorArea($filtro,$id_area);
            break;
        case "2":
            include"prestamo_espacio_control.php";
            echo filtroPorfechaA($filtro,$fechaPrestamo);
            break;
        case "3":
            include "prestamo_espacio_control.php";
            echo filtroPorfechaArea($filtro,$fechaPrestamo,$id_area);
            break;
        default:
            include "prestamo_espacio_control.php";
            echo historialPrestamos();
            break;
    }
}