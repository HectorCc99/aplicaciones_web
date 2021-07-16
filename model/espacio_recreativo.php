<?php

include "conexion.php";
class espacio_recreativo extends CONEXION_M
{
    private $id_espacio;
    private $nombre_espacio;
    private $ubicacion;
    private $tipo_area;
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

    /**
     * @return mixed
     */
    public function getNombreEspacio()
    {
        return $this->nombre_espacio;
    }

    /**
     * @param mixed $nombre_espacio
     */
    public function setNombreEspacio($nombre_espacio)
    {
        $this->nombre_espacio = $nombre_espacio;
    }

    /**
     * @return mixed
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * @param mixed $ubicacion
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }

    /**
     * @return mixed
     */
    public function getTipoArea()
    {
        return $this->tipo_area;
    }

    /**
     * @param mixed $tipo_area
     */
    public function setTipoArea($tipo_area)
    {
        $this->tipo_area = $tipo_area;
    }
    /*Funciones de la clase*/
    function insertarEspacioRecreativo(){
        $query= "INSERT INTO `espacio_recreativo`(`id_espacio`, `nombre_espacio`, `ubicacion`, `tipo_area`) 
        VALUES (NULL,'".$this->getNombreEspacio()."','".$this->getUbicacion()."','".$this->getTipoArea()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function modificarEspacioRecreativo(){
        $query="UPDATE `espacio_recreativo` SET `nombre_espacio`='".$this->getNombreEspacio()."',
                `ubicacion`='".$this->getUbicacion()."',`tipo_area`='".$this->getTipoArea()."' WHERE `id_espacio`='".$this->getIdEspacio()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function buscarEspacioRecreativo($id_espacio){
        $query="SELECT * FROM `espacio_recreativo` WHERE`id_espacio`=".$id_espacio;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function eliminarEspacioRecreativo(){
        $query="DELETE FROM `espacio_recreativo` WHERE `id_espacio`='".$this->getIdEspacio()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function listarEspacioRecreativo(){
        $query="SELECT * FROM `espacio_recreativo` ORDER BY `nombre_espacio` ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function prestamosEspacio($id_espacio){
        $query="SELECT p.*,er.*,u.* FROM prestamo p, pres_espacio pe, espacio_recreativo er, usuario u
                where p.id_prestamo=pe.id_prestamo
                and pe.id_espacio = er.id_espacio
                and p.id_usuario=u.id_usuario
                and p.estatus_prestamo=0
                and er.id_espacio=".$id_espacio;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function modifica_estatus_prestamo($id_prestamo,$estatus){
        $query="UPDATE `prestamo` SET `estatus_prestamo`='".$estatus."' WHERE `id_prestamo`=".$id_prestamo;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}