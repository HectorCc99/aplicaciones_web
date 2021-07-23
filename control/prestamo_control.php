<?php
function agregarprestamo($idUsuarioFK, $fechaPrestamo, $horaInicio, $horaFin){
    include_once "../model/prestamo.php";
    $obj_prestamo= new prestamo();
    $obj_prestamo->setIdUsuarioFK($idUsuarioFK);
    $obj_prestamo->setFechaPrestamo($fechaPrestamo);
    $obj_prestamo->setHoraInicio($horaInicio);
    $obj_prestamo->setHoraFin($horaFin);
    $obj_prestamo->setEstatusPrestamo(0);
    $obj_prestamo->agregarPrestamo();
     $result=$obj_prestamo->lastid();
     $id=json_encode($result);
    return $id;
}
function modificarprestamo($idPrestamo,$idUsuarioFK, $idAdminFK, $fechaPrestamo, $horaInicio, $horaFin,$estatus,$notas){
    include_once "../model/prestamo.php";
    $obj_prestamo= new prestamo();
    $obj_prestamo->setIdPrestamo($idPrestamo);
    $obj_prestamo->setIdUsuarioFK($idUsuarioFK);
    $obj_prestamo->setIdAdministradorFK($idAdminFK);
    $obj_prestamo->setFechaPrestamo($fechaPrestamo);
    $obj_prestamo->setHoraInicio($horaInicio);
    $obj_prestamo->setHoraFin($horaFin);
    $obj_prestamo->setEstatusPrestamo($estatus);
    $obj_prestamo->setNotas($notas);

    return $obj_prestamo->modificarPrestamo() ? "Prestamo actualizado correctamente." : "Error a realizar actualización.";
}
function buscarprestamo($idPrestamo){
    include_once "../model/prestamo.php";
    $obj_prestamo= new prestamo();
    $result = $obj_prestamo->buscarPrestamo($idPrestamo);
    $jason_data = json_encode($result);
    return $jason_data;
}
function eliminarprestamo($idPrestamo){
    include_once "../model/prestamo.php";
    $obj_prestamo= new prestamo();
    $obj_prestamo->setIdPrestamo($idPrestamo);
    return $obj_prestamo->eliminarPrestamo() ? "Prestamo eliminado correctamente" : "Error a eliminar registro";
}
function modificarEstatusprestamo($estatus,$id_prestamo){
    include_once "../model/prestamo.php";
    $obj_prestamo= new prestamo();
    $obj_prestamo->setEstatusPrestamo($estatus);
    $obj_prestamo->setIdPrestamo($id_prestamo);
    return $obj_prestamo->modificarEstatusPrestamo() ? "Estatus actualizado correctamente." : "Error a realizar actualización.";
}

function modificarNotasPrestamo($id_prestamo,$notas){
    include_once "../model/prestamo.php";
    $obj_prestamo= new prestamo();
    $obj_prestamo->setNotas($notas);
    $obj_prestamo->setIdPrestamo($id_prestamo);
    return $obj_prestamo->modificarNotasPrestamo() ? "Notas actualizadas correctamente." : "Error a realizar actualización.";
}
