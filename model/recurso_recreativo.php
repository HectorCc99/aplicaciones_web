<?php

include_once "conexion.php";

class recurso_recreativo extends CONEXION_M
{
    private $id_recurso;
    private $nombre_recurso;
    private $cantidad;

    /**
     * @return mixed
     */
    public function getIdRecurso()
    {
        return $this->id_recurso;
    }

    /**
     * @param mixed $id_recurso
     */
    public function setIdRecurso($id_recurso)
    {
        $this->id_recurso = $id_recurso;
    }

    /**
     * @return mixed
     */
    public function getNombreRecurso()
    {
        return $this->nombre_recurso;
    }

    /**
     * @param mixed $nombre_recurso
     */
    public function setNombreRecurso($nombre_recurso)
    {
        $this->nombre_recurso = $nombre_recurso;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    //funciones propias de la clase

    function agregarRecurso(){
        $query="INSERT INTO `recurso_recreativo` (`id_recurso`, `nombre_recurso`, `cantidad`)
                VALUES (NULL , '".$this->getNombreRecurso()."', '".$this->getCantidad()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function mostrarRecursos(){
        $query="SELECT * FROM `recurso_recreativo`ORDER BY nombre_recurso ASC";
        $this->connect(); //mostrar todos los registros de recursos_recreativos
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function mostrarRecurso(){
        $query="SELECT * FROM `recurso_recreativo` WHERE `id_recurso` =".$this->getIdRecurso();
        $this->connect(); //muestra solo un registro en base a su id
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function modificarRecurso(){
        $query="UPDATE `recurso_recreativo` SET `nombre_recurso`='".$this->getNombreRecurso()."', `cantidad`='".$this->getCantidad()."' 
                WHERE `id_recurso` =".$this->getIdRecurso();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function borrarRecurso(){
        $query="DELETE FROM `recurso_recreativo` WHERE `id_recurso`=".$this->getIdRecurso();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}