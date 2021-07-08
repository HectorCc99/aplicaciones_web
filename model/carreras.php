<?php

include"conexion.php";

class carreras extends CONEXION_M
{
    private $id_carrera;
    private  $nombre_carrera;

    /**
     * @return mixed
     */
    public function getIdCarrera()
    {
        return $this->id_carrera;
    }

    /**
     * @param mixed $id_carrera
     */
    public function setIdCarrera($id_carrera)
    {
        $this->id_carrera = $id_carrera;
    }

    /**
     * @return mixed
     */
    public function getNombreCarrera()
    {
        return $this->nombre_carrera;
    }

    /**
     * @param mixed $nombre_carrera
     */
    public function setNombreCarrera($nombre_carrera)
    {
        $this->nombre_carrera = $nombre_carrera;
    }

    // funciones propias de la clase

    function listacarreras(){
        $query="SELECT * FROM `carreras` ORDER BY nombre ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function  crearcarrera(){
        $query="INSERT INTO `carreras`(`id_carrera`, `nombre`) VALUES ('".$this->getIdCarrera()."','".$this->getNombreCarrera()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;

    }

    function modificarcarrera(){
        $query="UPDATE `carreras` SET `nombre`='".$this->getNombreCarrera()."' WHERE `id_carrera`=".$this->getIdCarrera();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}