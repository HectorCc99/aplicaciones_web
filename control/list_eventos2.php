<?php
if(isset($_POST['filtro'])){
    $filtro = $_POST['filtro'];

    switch ($filtro){
        //0 todos , 1 activos 2 inactivos
        case "1":
            $id_evento = $_POST['idEvento'];
            include_once "eventos_control.php";
            echo detallesEvento($id_evento);
            break;
        case "2":
            $id=$_POST['id'];
            $evento=$_POST['evento'];
            $encargado=$_POST['encargado'];
            $tel=$_POST['tel'];
            $semestre=$_POST['semestre'];
            $espacio=$_POST['espacio'];
            $recurso=$_POST['recurso'];
            $cant=$_POST['cant'];
            $descrip=$_POST['descrip'];
            $fechai=$_POST['fechai'];
            $fechaf=$_POST['fechaf'];
            $horai=$_POST['horai'];
            $horac=$_POST['horac'];
            $imagen=$_POST['imagen'];
            $id_admin=1; //Dato temporal, Se tomara cuando se trabaje con sesiones?

            include_once "eventos_control.php";
            echo actualizarEvento($id, $id_admin, $espacio, $recurso, $evento, $descrip,
                $encargado, $tel, $imagen, $cant,
                $fechai, $fechaf, $horai, $horac, $semestre);
            break;


    }
}
