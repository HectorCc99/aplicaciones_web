<?php
function registra_usuario($nombre,$primer,$segundo,$cuenta,$carrera,$email,$tel,$clave){
    include "../model/usuarios.php";
    $obj_usuario= new usuarios();
    $obj_usuario->setNombre($nombre);
    $obj_usuario->setPrimerAp($primer);
    $obj_usuario->setSegundoAp($segundo);
    $obj_usuario->setCuenta($cuenta);
    $obj_usuario->setIdCarreraFk($carrera);
    $obj_usuario->setCorreo($email);
    $obj_usuario->setTelefono($tel);
    $obj_usuario->setContraseña($clave);
    return $obj_usuario->agregar_usuario() ? "Registro exitoso" : "falla en el registro";

}
function editar_usuario($id,$nombre,$primer,$segundo,$cuenta,$carrera,$email,$tel){
    include "../model/usuarios.php";
    $obj_usuario= new usuarios();
    $obj_usuario->setIdUsuario($id);
    $obj_usuario->setNombre($nombre);
    $obj_usuario->setPrimerAp($primer);
    $obj_usuario->setSegundoAp($segundo);
    $obj_usuario->setCuenta($cuenta);
    $obj_usuario->setIdCarreraFk($carrera);
    $obj_usuario->setCorreo($email);
    $obj_usuario->setTelefono($tel);
    return $obj_usuario->modificar_usuario() ? "Modificacion exitosa" : "falla al modificar";
}

function editar_usuarioAdmin($id,$nombre,$primer,$segundo,$cuenta,$email,$tel){
    include "../model/usuarios.php";
    $obj_usuario= new usuarios();
    $obj_usuario->setIdUsuario($id);
    $obj_usuario->setNombre($nombre);
    $obj_usuario->setPrimerAp($primer);
    $obj_usuario->setSegundoAp($segundo);
    $obj_usuario->setCuenta($cuenta);
    $obj_usuario->setCorreo($email);
    $obj_usuario->setTelefono($tel);
    return $obj_usuario->modificar_usuarioAdmin() ? "Modificacion exitosa" : "falla al modificar";
}

function getlistaUsuarios($filtro)
{
    include_once "../model/usuarios.php";
    $obj_usuario = new usuarios();
    $result=$obj_usuario->listausuarios($filtro);
    $data=json_encode($result);
    return$data;
}

function detalles_usuario($id){
    include_once "../model/usuarios.php";
    $obj_usuario = new usuarios();
    $obj_usuario->setIdUsuario($id);
    $result=$obj_usuario->detallesusuario();
    $data=json_encode($result);
    return$data;
}

function editar_estatus_usuario($id,$estatus){
    include "../model/usuarios.php";
    $obj_usuario= new usuarios();
    $obj_usuario->setIdUsuario($id);
    $obj_usuario->setEstatusUsuario($estatus);
    return $obj_usuario->cambiar_estatus() ? "Modificacion exitosa" : "falla al modificar";
}
function busquedalogin($correo)
{
    include "../model/usuarios.php";
    $obj_usuario = new usuarios();
    $result = $obj_usuario->busquedaLogin($correo);
    $data = json_encode($result);
    return $data;
}

function editar_contraAdmin($id,$contra){
    include "../model/usuarios.php";
    $obj_usuario= new usuarios();
    $obj_usuario->setIdUsuario($id);
    $obj_usuario->setContraseña(md5($contra));
    return $obj_usuario->modificar_contra_usuario() ? "Modificacion exitosa" : "falla al modificar";
}

function historialPrestMat($id){
    include_once "../model/usuarios.php";
    $obj_usuario = new usuarios();
    $obj_usuario->setIdUsuario($id);
    $result=$obj_usuario->historial_prest_mat();
    $data =json_encode($result);
    return $data;
}

function historialPrestArea($id){
    include_once "../model/usuarios.php";
    $obj_usuario = new usuarios();
    $obj_usuario->setIdUsuario($id);
    $result=$obj_usuario->historial_prest_area();
    $data =json_encode($result);
    return $data;
}
