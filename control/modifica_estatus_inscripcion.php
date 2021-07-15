<?php
        $id=$_POST['id'];
        $estatus=$_POST['estatus'];
        include_once "usuario_act_control.php";
        echo editar_estatus($id,$estatus);