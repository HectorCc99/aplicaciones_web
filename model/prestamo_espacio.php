<?php
include_once "conexion.php";

class prestamo_espacio extends CONEXION_M
{
        private $id_prestamo;
        private $id_espacio;

    /**
     * @return mixed
     */
    public function getIdPrestamo()
    {
        return $this->id_prestamo;
    }

    /**
     * @param mixed $id_prestamo
     */
    public function setIdPrestamo($id_prestamo)
    {
        $this->id_prestamo = $id_prestamo;
    }

    /**
     * @return mixed
     */
    public function getIdEspacio()
    {
        return $this->id_espacio;
    }

    /**
     * @param mixed $id_espacio
     */
    public function setIdEspacio($id_espacio)
    {
        $this->id_espacio = $id_espacio;
    }
    //Funciones de la clase
    function insertarDatosPrestamo(){
        $query="INSERT INTO `pres_espacio`(`id_prestamo`, `id_espacio`)
        VALUES ('".$this->getIdPrestamo()."','".$this->getIdEspacio()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function modificarPrestamoEspacio(){
        $query="UPDATE `pres_espacio` SET `id_prestamo`='".$this->getIdPrestamo()."',`id_espacio`='".$this->getIdEspacio()."' WHERE `id_prestamo`='".$this->getIdPrestamo()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function buscarPrestamoEspacio($idprestamo){
        $query="SELECT * FROM `pres_espacio` WHERE `id_prestamo`='".$idprestamo."'";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function eliminarPrestamoEspacio(){
        $query="DELETE FROM `pres_espacio` WHERE `id_prestamo`='".$this->getIdPrestamo()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function historialPrestamos(){
        //Muestra solo los aceptados (0 Solicitados, 1 Aceptados 2 Rechazados)
        $query="SELECT pe.id_prestamo, er.nombre_espacio, p.fecha_prestamo, p.hora_inicio, p.hora_fin, p.notas
        FROM pres_espacio pe, espacio_recreativo er, prestamo p WHERE p.id_prestamo=pe.id_prestamo AND pe.id_espacio=er.id_espacio
        AND p.estatus_prestamo='1'ORDER BY nombre_espacio DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function historialPrestamoFechas(){
        //Muestra solo los aceptados (0 Solicitados, 1 Aceptados 2 Rechazados)
        $query="SELECT p.fecha_prestamo
        FROM pres_espacio pe, espacio_recreativo er, prestamo p WHERE p.id_prestamo=pe.id_prestamo AND pe.id_espacio=er.id_espacio
        AND p.estatus_prestamo='1' GROUP BY fecha_prestamo DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function solicitudesAreasDeportivas(){
        //Muestra solo los solicitados para la tabla
        $query="SELECT pe.id_prestamo,u.nombre,u.primer_ap, u.segundo_ap ,er.nombre_espacio, p.fecha_prestamo, p.hora_inicio, p.hora_fin
        FROM usuario u, pres_espacio pe, espacio_recreativo er, prestamo p WHERE p.id_prestamo=pe.id_prestamo AND pe.id_espacio=er.id_espacio
        AND u.id_usuario=p.id_usuario AND p.estatus_prestamo='0'ORDER BY fecha_prestamo, hora_inicio DESC ";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function filtroPorArea($filtro,$id_espacio){
        //Muestra los solicitudes (0 Solicitados, 1 Aceptados 2 Rechazados)
        switch ($filtro){
            case "1":
                $filtro2= " AND p.estatus_prestamo = 0";
                break;
            case "2":
                $filtro2= " AND p.estatus_prestamo = 1";
                break;
            case "3":
                $filtro2= " AND p.estatus_prestamo = 2";
                break;
            default:
                $filtro2= " ";
                break;
        }
        //Muestra solo los solicitados para el filtro de la tabla pero por Área
        $query="SELECT pe.id_prestamo,u.nombre,u.primer_ap, u.segundo_ap ,er.nombre_espacio, p.fecha_prestamo, p.hora_inicio, p.hora_fin
        FROM usuario u, pres_espacio pe, espacio_recreativo er, prestamo p 
        WHERE p.id_prestamo=pe.id_prestamo AND pe.id_espacio=er.id_espacio
        AND u.id_usuario=p.id_usuario ".$filtro2." AND pe.id_espacio='".$id_espacio."' 
        ORDER BY nombre_espacio, fecha_prestamo, hora_inicio DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function filtroPorfecha($filtro,$fechaSolicitud){
        //Muestra solo los solicitados para el filtro de la tabla pero fecha
        switch ($filtro){
            case "1":
                $filtro2= " AND p.estatus_prestamo = 0";
                break;
            case "2":
                $filtro2= " AND p.estatus_prestamo = 1";
                break;
            case "3":
                $filtro2= " AND p.estatus_prestamo = 2";
                break;
            default:
                $filtro2= " ";
                break;
        }
        $query="SELECT pe.id_prestamo,u.nombre,u.primer_ap, u.segundo_ap ,er.nombre_espacio, p.fecha_prestamo, p.hora_inicio, p.hora_fin
        FROM usuario u, pres_espacio pe, espacio_recreativo er, prestamo p 
        WHERE p.id_prestamo=pe.id_prestamo AND pe.id_espacio=er.id_espacio
        AND u.id_usuario=p.id_usuario ".$filtro2." AND p.fecha_prestamo='".$fechaSolicitud."' 
        ORDER BY nombre_espacio,fecha_prestamo, hora_inicio DESC ";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function filtroPorfechaArea($filtro,$fechaSolicitud, $id_espacio){
        //Muestra solo los solicitados para el filtro de la tabla pero fecha
        switch ($filtro){
            case "1":
                $filtro2= "AND p.estatus_prestamo = 0";
                break;
            case "2":
                $filtro2= "AND p.estatus_prestamo = 1";
                break;
            case "3":
                $filtro2= "AND p.estatus_prestamo = 2";
                break;
            default:
                $filtro2= " ";
                break;
        }
        $query="SELECT pe.id_prestamo,u.nombre,u.primer_ap, u.segundo_ap ,er.nombre_espacio, p.fecha_prestamo, p.hora_inicio, p.hora_fin
        FROM usuario u, pres_espacio pe, espacio_recreativo er, prestamo p 
        WHERE p.id_prestamo=pe.id_prestamo AND pe.id_espacio=er.id_espacio
        AND u.id_usuario=p.id_usuario ".$filtro2." AND p.fecha_prestamo='".$fechaSolicitud."' AND  pe.id_espacio='".$id_espacio."'
        ORDER BY nombre_espacio,fecha_prestamo, hora_inicio DESC ";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
}