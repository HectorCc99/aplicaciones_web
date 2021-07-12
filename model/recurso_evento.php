<?php

include"conexion.php";

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

    //mostrar todos los registros
    function mostrarRecursosEventos(){
        $query="SELECT * FROM `recurso_evento`";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    //mostrar solo un registro para editar (?)
    function mostrarRecursoEvento(){
        $query="SELECT * FROM `recurso_evento` WHERE id_recurso =".$this->getIdRecurso();
        // ¿se llamaria tambien a la tabla de eventos para ponerlo en el where?
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function agregarRecursoEvento(){
        $query="INSERT INTO `recurso_evento` (`id_recurso`, `id_evento`, `cantidad`, `notas`) 
			                        VALUES (NULL, '".$this->getIdEventoPkfk()."', '".$this->getCantidad()."', '".$this->getNotas()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function modificarRecursoEvento(){
        $query="UPDATE `recurso_evento` SET `cantidad`='".$this->getCantidad()."', `notas`='".$this->getNotas()."'
                WHERE `id_recurso`=".$this->getIdRecurso();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function eliminarRecursoEvento(){
        $query="DELETE FROM `recurso_evento` WHERE id_recurso = ".$this->getIdRecurso();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}