<?php
        $id_alumno=$_POST['id_alumno'];
        $material=$_POST['material'];
        $fechaP=$_POST['fechaP'];
        $hora_solicitada=$_POST['hora_solicitada'];
        $hora_lim=$_POST['hora_lim'];
        $filtro=$_POST['filtro'];

        switch ($filtro){
            case "1":
                include_once "prestamo_control.php";
                if($id=agregarprestamo($id_alumno, $fechaP, $hora_solicitada, $hora_lim)){
                    include_once "prestamo_recurso_control.php";

                    $id2=json_decode($id,true);
                    $id_m=$id2[0]['MAX(id_prestamo)'];
                    echo agregarPrestamoRecursos($material,$id_m);
                }
                break;
            case "2":
                include_once "prestamo_control.php";
                if($id=agregarprestamo($id_alumno, $fechaP, $hora_solicitada, $hora_lim)){
                    include_once "prestamo_espacio_control.php";

                    $id2=json_decode($id,true);
                    $id_m=$id2[0]['MAX(id_prestamo)'];
                    echo  insertarDatosPrestamoEspacio($id_m, $material);
                }
                break;
        }