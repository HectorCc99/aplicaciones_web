<?php

    if (isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];
    } else {
        $tipo = 0;
    }

    include "../control/actividades_control.php";
    echo traeDetallesActividades2($tipo);

