<?php
if(isset($_POST['contraseniaIngresada'])) {
    $contraseniaMD5=md5($_POST['contraseniaIngresada']);
    echo  json_encode($contraseniaMD5);
}