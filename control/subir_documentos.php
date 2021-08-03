<?php
    // id_alumno
    $id_alumno=$_POST['id_usuario'];
    $semestre=$_POST['semestre'];

    include_once "archivos_control.php";
    $tiraM=0;
    $Axa=0;
    $seguroESt=0;
    $credencial=0;
    if (isset($_FILES['tira'])){
        $tira=$_FILES['tira']['tmp_name'];
        $tira2="Tira de Materias";
        $tira3="Tira de Materias";
        $tiraM=agregarArchivo($id_alumno,$tira2,$semestre,$tira3,$tira);
    }
    if(isset($_FILES['seguro_axa'])){
        $seguro_axa=$_FILES['seguro_axa']['tmp_name'];
        $seguro_axa2="Seguro Axa";
        $seguro_axa3="Seguro Axa";
        $Axa=agregarArchivo($id_alumno,$seguro_axa2,$semestre,$seguro_axa3,$seguro_axa);
    }

    if(isset($_FILES['seguro_estudiante'])){
        $seguro_estudiante=$_FILES['seguro_estudiante']['tmp_name'];
        $seguro_estudiante2="Seguro de Estudiante";
        $seguro_estudiante3="Seguro de estudiante";
        $seguroESt=agregarArchivo($id_alumno,$seguro_estudiante2,$semestre,$seguro_estudiante3,$seguro_estudiante);
    }

    if (isset($_FILES['credencial_escolar'])) {
        $credencial_escolar = $_FILES['credencial_escolar']['tmp_name'];
        $credencial_escolar2 = "Credencial Escolar";
        $credencial_escolar3 = "Credencial_escolar";
        $credencial=agregarArchivo($id_alumno,$credencial_escolar2,$semestre,$credencial_escolar3,$credencial_escolar);
    }
    // subir archivos

        if( $tiraM ==1 && $Axa==1 && $seguroESt==1 && $credencial==1){
            echo "<script> alert('Documentos subidos con exito'); window.location = '../alumno-inicio.php'; </script>";
        }else{
            echo "<script> alert('Error al subir documentos'); window.location = '../alumno-inicio.php'; </script>";
        }

