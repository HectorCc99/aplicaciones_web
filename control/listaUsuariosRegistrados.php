<?php
if(isset($_POST['correo'])){
    $correo=$_POST["correo"];
    include "usuario_control.php";
    echo busquedalogin($correo);
}
