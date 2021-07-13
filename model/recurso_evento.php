<?php

include "conexion.php";

class recurso_evento extends CONEXION_M
{
    private $id_recurso;
    private $id_evento_pkfk;
    private $cantidad;
    private $notas;

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
    public function getIdEventoPkfk()
    {
        return $this->id_evento_pkfk;
    }

    /**
     * @param mixed $id_evento_pkfk
     */
    public function setIdEventoPkfk($id_evento_pkfk)
    {
        $this->id_evento_pkfk = $id_evento_pkfk;
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

    /**
     * @return mixed
     */
    public function getNotas()
    {
        return $this->notas;
    }

    /**
     * @param mixed $notas
     */
    public function setNotas($notas)
    {
        $this->notas = $notas;
    }

    //funciones propias de la clase

    // AGREGAR

    function agregarRecursoEvento(){
        $query="INSERT INTO `recurso_evento` (`id_recurso`, `id_evento`, `cantidad`)
			                        VALUES ('".$this->getIdRecurso()."', '".$this->getIdEventoPkfk()."', '".$this->getCantidad()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }


    // MOSTRAR
    function mostrarRecursosEventos(){
        $query="SELECT re.*, rr.nombre_recurso, e.nombre_actividad 
                FROM recurso_evento re,
                recurso_recreativo rr, 
                eventos e  
                WHERE re.id_recurso = rr.id_recurso 
                AND re.id_evento = e.id_evento
                ORDER BY rr.nombre_recurso ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function mostrarRecursoEvento(){
        $query="SELECT re.*, rr.nombre_recurso, e.nombre_actividad 
                FROM recurso_evento re,
                recurso_recreativo rr, 
                eventos e  
                WHERE re.id_recurso = rr.id_recurso 
                AND re.id_evento = e.id_evento 
                AND re.id_recurso =".$this->getIdRecurso();
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }


    // MODIFICAR
    function modificarRecursoEvento(){
        $query="UPDATE `recurso_evento` SET `id_recurso`='".$this->getIdRecurso()."', `id_evento`='".$this->getIdEventoPkfk()."', `cantidad`='".$this->getCantidad()."'
                WHERE `id_recurso`=".$this->getIdRecurso();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function agregarNotasRE(){
        $query="UPDATE `recurso_evento` SET `notas`='".$this->getNotas()."'
                WHERE `id_recurso`=".$this->getIdRecurso();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    // ELIMINAR
    function borrarRecursoEvento(){
        $query="DELETE FROM `recurso_evento` WHERE id_recurso = ".$this->getIdRecurso();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}