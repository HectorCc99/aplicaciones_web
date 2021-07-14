<?php

 if(isset($_POST['grupo']) && isset($_POST['deporte']) && isset($_POST['prof']) && isset($_POST['telefono']) && isset($_POST['semestre'])
        && isset($_POST['cupo'] )&& isset($_POST['lugar'])){

	$grupo=$_POST['grupo'];
	$deporte=$_POST['deporte'];
	$prof=$_POST['prof'];
	$tel=$_POST['telefono'];
	$semestre=$_POST['semestre'];
	$cupo=$_POST['cupo']; 
	$lugar=$_POST['lugar'];
	$lunes=$_POST['lunes'];
	$martes=$_POST['martes'];
	$mier=$_POST['mier'];
	$jueves=$_POST['jueves'];
	$viernes=$_POST['viernes'];
	$lunes2=$_POST['lunes2'];
	$martes2=$_POST['martes2'];
	$mier2=$_POST['mier2'];
	$jueves2=$_POST['jueves2'];
	$viernes2=$_POST['viernes2'];
	include_once "horarios_control.php";
     $lunes_C="$lunes-$lunes2";
     $martes_C="$martes-$martes2";
     $miercoles_C="$mier-$mier2";
     $juieves_c="$jueves-$jueves2";
     $viernes_c="$viernes-$viernes2";
     $id_horario=date('Y-m-d H:i:s');


	if(Agregar_Horario($id_horario,$lunes_C,$martes_C,$miercoles_C,$juieves_c,$viernes_c)){
        include_once "grupos_control.php";
        echo registra_grupo($deporte,$grupo,$cupo,$prof,$lugar,$id_horario,$semestre,1,$tel);
    }

	



                


}