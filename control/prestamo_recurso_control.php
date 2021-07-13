<?php
function agregarPrestamoRecursos($id_recurso,$id_prestamo)
{
    include_once "../model/prestamo_recurso.php";
    $obj_prestamoRecurso = new prestamo_recurso();
    $obj_prestamoRecurso->setIdRecurso($id_recurso);
    $obj_prestamoRecurso->setIdPrestamo($id_prestamo);
    return $obj_prestamoRecurso->agregarPrestamoRecursos() ? "Registro realizado correctamente." : "Error a agregar los datos.";
}
function modificarPrestamoRecurso($idPrestamoMa,$idRecurso,$idPrestamo){
    include_once "../model/prestamo_recurso.php";
    $obj_prestamoRecurso= new prestamo_recurso();
    $obj_prestamoRecurso->setIdPrestamoMaterial($idPrestamoMa);
    $obj_prestamoRecurso->setIdPrestamo($idPrestamo);
    $obj_prestamoRecurso->setIdRecurso($idRecurso);
    return $obj_prestamoRecurso->modificarPrestamoRecurso() ? "Datos modificados correctamente." : "Error a realizar modificación.";
}

function eliminarPrestamoRecurso($idPrestamoMa){
    include_once "../model/prestamo_recurso.php";
    $obj_prestamoRecurso= new prestamo_recurso();
    $obj_prestamoRecurso->setIdPrestamoMaterial($idPrestamoMa);
    return $obj_prestamoRecurso->eliminarPrestamoRecurso() ? "Datos eliminados correctamente." : "Error a realizar eliminación.";
}


function buscarPrestamoRecurso($idPrestamoMa){
    include_once "../model/prestamo_recurso.php";
    $obj_prestamoRecurso= new prestamo_recurso();
    $result = $obj_prestamoRecurso->buscarPrestamoRecurso($idPrestamoMa);
    $jason_data = json_encode($result);
    return $jason_data;
}

function historialPrestamoRecurso()
{
    include_once "../model/prestamo_recurso.php";
    $obj_prestamoRecurso = new prestamo_recurso();
    $result = $obj_prestamoRecurso->historialPrestamoRecurso();
    $jason_data = json_encode($result);
    return $jason_data;
}
function listaDevolucion()
{
    include_once "../model/prestamo_recurso.php";
    $obj_prestamoRecurso = new prestamo_recurso();
    $result = $obj_prestamoRecurso->listaDevolucion();
    $jason_data = json_encode($result);
    return $jason_data;
}

function listaSolicitudes()
{
    include_once "../model/prestamo_recurso.php";
    $obj_prestamoRecurso = new prestamo_recurso();
    $result = $obj_prestamoRecurso->listaSolicitudes();
    $jason_data = json_encode($result);
    return $jason_data;
}
function filtroPorFecha($fecha)
{
    include_once "../model/prestamo_recurso.php";
    $obj_prestamoRecurso = new prestamo_recurso();
    $result = $obj_prestamoRecurso->filtroPorFecha($fecha);
    $jason_data = json_encode($result);
    return $jason_data;
}
function filtroPorMaterial($material)
{
    include_once "../model/prestamo_recurso.php";
    $obj_prestamoRecurso = new prestamo_recurso();
    $result = $obj_prestamoRecurso->filtroPorMaterial($material);
    $jason_data = json_encode($result);
    return $jason_data;
}
function filtroPorMaterialYFecha($material,$fecha)
{
    include_once "../model/prestamo_recurso.php";
    $obj_prestamoRecurso = new prestamo_recurso();
    $result = $obj_prestamoRecurso->filtroPorMaterialYFecha($material,$fecha);
    $jason_data = json_encode($result);
    return $jason_data;
}