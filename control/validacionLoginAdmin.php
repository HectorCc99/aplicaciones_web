<?php
if (isset($_POST['idUsuario'])){
    $idUsuario=$_POST['idUsuario'];
    include "administrador_control.php";
    echo buscarIdUsuarioFK($idUsuario);
}