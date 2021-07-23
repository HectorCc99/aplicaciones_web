<?php
        $id_usuario=$_POST['id_usuario'];
        $id_grupo=$_POST['id_grupo'];
        $año=$_POST['semestre'];

        include_once "usuario_act_control.php";
        echo crear_asignacion($id_usuario,$id_grupo,$año);