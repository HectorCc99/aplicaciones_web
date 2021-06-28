
<?php
$mysqli = new mysqli("localhost", "root", "", "wen");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
    echo "Conexion Exitosa";
}

?>
