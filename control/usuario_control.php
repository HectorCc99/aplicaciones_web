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