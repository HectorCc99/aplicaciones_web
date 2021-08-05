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
            if(isset($_FILES['posterEd'])){
                include_once "eventos_control.php";
                $id=$_POST['evento_id_edit'];
                $evento=$_POST['eventoEd'];
                $encargado=$_POST['encargadoEd'];
                $tel=$_POST['telefonoEvEd'];
                $semestre=$_POST['semEvEd'];
                $espacio=$_POST['lugarEvEd'];
                if(isset($_POST['materialEvEd'])){
                    $recurso=$_POST['materialEvEd'];
                    $cant=$_POST['cantidadEvEd'];
                }else{
                    $recurso="";
                    $cant="";
                }
                
                $descrip=$_POST['descripcionEvEd'];
                $fechai=$_POST['fecha_inicioEd'];
                $fechaf=$_POST['fecha_cierreEd'];
                $horai=$_POST['hora_inicioEd'];
                $horac=$_POST['hora_cierreEd'];
                $id_admin=$_POST['id_admin'];

                $nombreArchivo = $_FILES['posterEd']['name'];
                $Archivo = $_FILES['posterEd']['tmp_name'];

                $result= actualizarEvento($id, $id_admin, $espacio, $recurso, $evento, $descrip,
                    $encargado, $tel, $cant,
                    $fechai, $fechaf, $horai, $horac, $semestre, $nombreArchivo, $Archivo);

                if($result==1){
                    header('Location: ../admin-eventos.php ');
                }

            }else{
                echo "Error al enviar el archivo";
            }
            break;
    }
}
