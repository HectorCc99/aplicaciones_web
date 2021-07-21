<?php
        $filtro=$_POST['filtro'];
        include_once "rec_recreativo_control.php";
        switch ($filtro) {
            //registra nuevo material
            case "1":
                $nombre=$_POST['nombre'];
                $piezas=$_POST['piezas'];
                echo insertarRecursos($nombre,$piezas);
                break;
            // modifica material
            case "2":
                $id_elemento=$_POST['id_elemento'];
                $nombre=$_POST['nombre'];
                $piezas=$_POST['piezas'];
                echo actualizarRecurso($id_elemento,$nombre,$piezas);
                break;
                // detalles de un material
            case "3":
                $id_elemento=$_POST['id_elemento'];
                echo detallesRecurso($id_elemento);
                break;
                //elimina un elemento
            case "4":
                $id_elemento=$_POST['id_elemento'];
                echo eliminarRecurso($id_elemento);
                break;

        }
