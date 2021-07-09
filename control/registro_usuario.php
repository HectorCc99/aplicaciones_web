<?php
if(isset($_POST['nombre']) && isset($_POST['primera'])&& isset($_POST['segunda']) && isset($_POST['cuenta'])
    && isset($_POST['carrera']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['clave'])
    && isset($_POST['clave_co'])){

    $nombre=$_POST['nombre'];
    $primer=$_POST['primera'];
    $segundo=$_POST['segunda'];
    $cuenta=$_POST['cuenta'];
    $carrera=$_POST['carrera'];
    $email=$_POST['email'];
   $tel=$_POST['tel'];
    $clave=$_POST['clave'];
    $clave_co=$_POST['clave_co'];

    include "usuario_control.php";
    registra_usuario($nombre,$primer,$segundo,$cuenta,$carrera,$email,$tel,md5($clave));
}