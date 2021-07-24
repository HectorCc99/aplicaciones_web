<?php
    // id_alumno
    $id_alumno=$_POST['id_usuario'];
    $semestre=$_POST['semestre'];
    //Archivos en si
    $tira=$_FILES['tira']['tmp_name'];
    $seguro_estudiante=$_FILES['seguro_estudiante']['tmp_name'];
    $seguro_axa=$_FILES['seguro_axa']['tmp_name'];
    $credencial_escolar=$_FILES['credencial_escolar']['tmp_name'];
    // nombre de archivo
    $tira2=$_FILES['tira']['name'];
    $seguro_estudiante2=$_FILES['seguro_estudiante']['name'];
    $seguro_axa2=$_FILES['seguro_axa']['name'];
    $credencial_escolar2=$_FILES['credencial_escolar']['name'];
    // extension
    $tira3="Tira de Materias";
    $seguro_estudiante3="Seguro de estudiante";
    $seguro_axa3="Seguro Axa";
    $credencial_escolar3="Credencial_escolar";

    // subir archivos
    include_once "archivos_control.php";
        echo agregarArchivo($id_alumno,$tira2,$semestre,$tira3,$tira);
        echo agregarArchivo($id_alumno,$seguro_estudiante2,$semestre,$seguro_estudiante3,$seguro_estudiante);
        echo agregarArchivo($id_alumno,$seguro_axa2,$semestre,$seguro_axa3,$seguro_axa);
        echo agregarArchivo($id_alumno,$credencial_escolar2,$semestre,$credencial_escolar3,$credencial_escolar);
header('Location: ../alumno-inicio.php');
