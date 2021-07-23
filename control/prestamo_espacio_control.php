<?php
function insertarDatosPrestamoEspacio($id_prestamo, $id_espacio){
    include_once "../model/prestamo_espacio.php";
    $obj_prestamoEspacio= new prestamo_espacio();
    $obj_prestamoEspacio->setIdPrestamo($id_prestamo);
    $obj_prestamoEspacio->setIdEspacio($id_espacio);
    return $obj_prestamoEspacio->insertarDatosPrestamo();
}
function modificarPrestamoEspacio($idPrestamo,$idEspacio){
    include_once "../model/prestamo_espacio.php";
    $obj_prestamo= new prestamo_espacio();
    $obj_prestamo->setIdPrestamo($idPrestamo);
    $obj_prestamo->setIdEspacio($idEspacio);
    return $obj_prestamo->modificarPrestamoEspacio() ? "Datos actualizados correctamente." : "Error a realizar actualización.";
}

function buscarPrestamoEspacio($idPrestamo){
    include_once "../model/prestamo_espacio.php";
    $obj_prestamoEspacio= new prestamo_espacio();
    $result = $obj_prestamoEspacio->buscarPrestamoEspacio($idPrestamo);
    $jason_data = json_encode($result);
    return $jason_data;
}
function eliminarPrestamoEspacio($idPrestamo){
    include_once "../model/prestamo_espacio.php";
    $obj_prestamo= new prestamo_espacio();
    $obj_prestamo->setIdPrestamo($idPrestamo);
    return $obj_prestamo->eliminarPrestamoEspacio() ? "Datos eliminados correctamente." : "Error a realizar eliminación.";
}




function historialPrestamos()
{
    include_once "../model/prestamo_espacio.php";
    $obj_prestamoEspacio = new prestamo_espacio();
    $result = $obj_prestamoEspacio->historialPrestamos();
    $jason_data = json_encode($result);
    return $jason_data;
}
function solicitudesAreasDeportivas()
{
    include_once "../model/prestamo_espacio.php";
    $obj_prestamoEspacio = new prestamo_espacio();
    $result = $obj_prestamoEspacio->solicitudesAreasDeportivas();
    $jason_data = json_encode($result);
    return $jason_data;
}
function filtroPorArea($filtro, $id_espacio)
{
    include_once "../model/prestamo_espacio.php";
    $obj_prestamoEspacio = new prestamo_espacio();
    $result = $obj_prestamoEspacio->filtroPorArea($filtro,$id_espacio);
    $jason_data = json_encode($result);
    return $jason_data;
}
function filtroPorfechaA($filtro,$fecha)
{
    include_once "../model/prestamo_espacio.php";
    $obj_prestamoEspacio = new prestamo_espacio();
    $result = $obj_prestamoEspacio->filtroPorfecha($filtro,$fecha);
    $jason_data = json_encode($result);
    return $jason_data;
}
function filtroPorfechaArea($filtro,$fecha,$id_espacio)
{
    include_once "../model/prestamo_espacio.php";
    $obj_prestamoEspacio = new prestamo_espacio();
    $result = $obj_prestamoEspacio->filtroPorfechaArea($filtro,$fecha,$id_espacio);
    $jason_data = json_encode($result);
    return $jason_data;
}
function historialPrestamoFechas()
{
    include_once "../model/prestamo_espacio.php";
    $obj_prestamoEspacio = new prestamo_espacio();
    $result = $obj_prestamoEspacio->historialPrestamoFechas();
    $jason_data = json_encode($result);
    return $jason_data;
}
