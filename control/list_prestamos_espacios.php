<?php
include_once "espacio_recreativo_control.php";
$id_espacio=$_POST['id'];
echo prestamos_espacio($id_espacio);