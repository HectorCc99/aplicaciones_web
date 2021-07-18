<?php
if (isset($_POST['filtro']) ) {
    $filtro = $_POST['filtro'];

    switch ($filtro){
        // 0 todos, 1 de una actividad, 2 detalles grupo
        case "1":
            $id_actividad=$_POST['idGrupo'];
            include_once "grupos_control.php";
            echo listaGruposdeunaActividad($id_actividad);
            break;
        case "2":
            $id_grupo=$_POST['id_grupo'];
            include_once "grupos_control.php";
            echo DetallesGrupo($id_grupo);
            break;
        case "3":

            $id_horario=$_POST['id_horario'];
            $id=$_POST['id'];
            $nombre_grupo=$_POST['nombre_grupo'];
            $deporte=$_POST['deporte'];
            $prof=$_POST['prof'];
            $tel=$_POST['tel'];
            $semestre=$_POST['semestre'];
            $cupo=$_POST['cupo'];
            $lugar=$_POST['lugar'];
            $horainicioL=$_POST['horainicioL'];
            $horafinL=$_POST['horafinL'];
            $horainiciom=$_POST['horainiciom'];
            $horafinm=$_POST['horafinm'];
            $horainiciomi=$_POST['horainiciomi'];
            $horafinmi=$_POST['horafinmi'];
            $horainicioj=$_POST['horainicioj'];
            $horafinj=$_POST['horafinj'];
            $horainiciov=$_POST['horainiciov'];
            $horafinv=$_POST['horafinv'];
            //horarios
            $lunes="$horainicioL-$horafinL";
            $martes="$horainiciom-$horafinm";
            $miercoles="$horainiciomi-$horafinmi";
            $jueves="$horainicioj-$horafinj";
            $viernes="$horainiciov-$horafinv";
            include_once "horarios_control.php";
            if(modiciaHorario($id_horario,$lunes,$martes,$miercoles,$jueves,$viernes)){
                include_once "grupos_control.php";
                echo Actualiza_grupo($id,$deporte,$nombre_grupo,$cupo,$prof,$lugar,1,$id_horario,$semestre,$tel);
            }
            
            break;
        default:
            include_once "grupos_control.php";
            echo listaGrupos();
            break;
    }
}