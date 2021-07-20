<?php
if (isset($_FILES['archivo'])) {
    include_once "./archivos_control.php";

    //declaro mis variables que enviare a la funcion

    $nombreArchivo = $_FILES['archivo']['name'];
    $Archivo = $_FILES['archivo']['tmp_name'];
    // envio a documentos control el archivo
    $id_usuario=1;
    $semestre=$_POST['semesetre'];
    $tipo_ar=$_POST['tipo_ar'];
    $result=agregarArchivo($id_usuario,$nombreArchivo,$semestre,$tipo_ar,$Archivo);
    echo $result;

} else {
    echo "error al enviar el archivo";
}