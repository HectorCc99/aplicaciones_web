<?php
function agregar_admin($id_usuarioFK){
    include_once "../model/administrador.php";
    $obj_admin= new administrador();
    $obj_admin->setIdUsuarioFx($id_usuarioFK);
    $obj_admin->setEstatusAdmin(1);
    return $obj_admin->agregar_admin() ? "Registro exitoso" : "falla en el registro";

}
function cambiarEstatusAdmin($estatusAdmin,$id_admin){
    include_once "../model/administrador.php";
    $obj_admin= new administrador();
    $obj_admin->setEstatusAdmin($estatusAdmin);
    $obj_admin->setIdAdmin($id_admin);
    return $obj_admin->modificarEstatus_Admin() ? "Registro modificado exitosamente" : "Error al modificar registro";
}
function buscarIdUsuarioFK($idUsuarioFK){
    include_once "../model/administrador.php";
    $obj_admin = new administrador();
    $result = $obj_admin->buscarIdUsuarioFK($idUsuarioFK);
    $jason_data = json_encode($result);
    return $jason_data;
}
function listaAdministradores($tipoEstatus){
    include_once "../model/administrador.php";
    $obj_admin= new administrador();
    $result=$obj_admin->listaAdmin($tipoEstatus);
    $jason_data=json_encode($result);
    return $jason_data;
}

function eliminarAdmin($id_admin)
{
    include_once "../model/administrador.php";
    $obj_admin= new administrador();
    $obj_admin->setIdAdmin($id_admin);
    return $obj_admin->eliminarAdministrador() ? "Registro eliminado exitosamente" : "Error al eliminar registro";
}
function buscarAdmin($idAdmin){
    include_once "../model/administrador.php";
    $obj_admin = new administrador();
    $result = $obj_admin->buscarAdmin($idAdmin);
    $jason_data = json_encode($result);
    return $jason_data;
}
function actualizarAdmin($idUsuarioFK,$fechaAlta,$estatusAdmin,$id_admin){
    include_once "../model/administrador.php";
    $obj_admin = new administrador();
    $obj_admin->setIdUsuarioFx($idUsuarioFK);
    $obj_admin->setFechaAlta($fechaAlta);
    $obj_admin->setEstatusAdmin($estatusAdmin);
    $obj_admin->setIdAdmin($id_admin);
    return $obj_admin->actualizarAdmin() ? "Registro modificado exitosamente" : "Error al modificar registro";
}

function detalles_usuarioAdmin($id){
    include_once "../model/administrador.php";
    $obj_usuario = new administrador();
    $obj_usuario->setIdAdmin($id);
    $result=$obj_usuario->detallesusuarioAdmin();
    $data=json_encode($result);
    return$data;
}