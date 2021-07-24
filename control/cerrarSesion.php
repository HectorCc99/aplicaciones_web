<?php
session_start();
if(isset($_GET['cerrar'])) {
    if(isset($_SESSION['id_usuario'])|| isset($_SESSION['id_Admin'])) {
        //Vaciamos y destruimos las variables de sesión
        if (isset($_SESSION['id_Admin'])){
            $_SESSION['id_Admin'] = NULL;
            unset($_SESSION['id_Admin']);
        }else if(isset($_SESSION['id_usuario'])){
            $_SESSION['id_usuario'] = NULL;
            unset($_SESSION['id_usuario']);
        }
    }

    //Redireccionamos a la pagina home.php
    header('Location: ../home.php');
}

?>