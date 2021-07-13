<?php

include"conexion.php";

class actividad_recursos extends CONEXION_M
{
    //Variables de actividad_recursos

    private $id_actividad_recurso;
    private $id_actividad_fk;
    private $id_recurso_fk;
    private $cantidad;
    private $notas;

    /**
     * @return mixed
     */
    public function getIdActividadRecurso()
    {
        return $this->id_actividad_recurso;
    }

    /**
     * @param mixed $id_actividad_recurso
     */
    public function setIdActividadRecurso($id_actividad_recurso)
    {
        $this->id_actividad_recurso = $id_actividad_recurso;
    }

    /**
     * @return mixed
     */
    public function getIdActividadFk()
    {
        return $this->id_actividad_fk;
    }

    /**
     * @param mixed $id_actividad_fk
     */
    public function setIdActividadFk($id_actividad_fk)
    {
        $this->id_actividad_fk = $id_actividad_fk;
    }

    /**
     * @return mixed
     */
    public function getIdRecursoFk()
    {
        return $this->id_recurso_fk;
    }

    /**
     * @param mixed $id_recurso_fk
     */
    public function setIdRecursoFk($id_recurso_fk)
    {
        $this->id_recurso_fk = $id_recurso_fk;
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
    function agregarActividadRecursos(){
        $query = "INSERT INTO `actividad_recursos`(`id_actividad_recurso`, `id_actividad`, `id_recurso`, `cantidad`)
                    VALUES (NULL,'".$this->getIdActividadFk()."','".$this->getIdRecursoFk()."','".$this->getCantidad()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    // MOSTRAR
    function mostrarListaActividadRecursos(){ //TODOS LOS REGISTROS
        $query="SELECT ar.id_actividad_recurso, arc.nombre_actividad, rr.nombre_recurso FROM actividad_recursos ar, actividad_recreativa arc, recurso_recreativo rr 
                WHERE ar.id_actividad= arc.id_actividad and ar.id_recurso=rr.id_recurso ORDER BY arc.nombre_actividad,rr.nombre_recurso ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function mostrarRecursodeActividad(){ //UN REGISTRO
        $query="SELECT ar.id_actividad_recurso, arc.nombre_actividad, rr.nombre_recurso FROM actividad_recursos ar, actividad_recreativa arc, recurso_recreativo rr 
                WHERE ar.id_actividad= arc.id_actividad AND ar.id_recurso=rr.id_recurso AND id_actividad_recurso=".$this->getIdActividadRecurso()." ORDER BY arc.nombre_actividad,rr.nombre_recurso ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    // MODIFICAR
    function modificarActividadRecursos(){
        $query="UPDATE `actividad_recursos` SET `id_actividad`='".$this->getIdActividadFk()."', `id_recurso`='".$this->getIdRecursoFk()."', `cantidad`='".$this->getCantidad()."'
                WHERE `id_actividad_recurso`=".$this->getIdActividadRecurso();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function agregarNotas(){
        $query="UPDATE `actividad_recursos` SET   `notas`='".$this->getNotas()."' WHERE `id_actividad_recurso`=".$this->getIdActividadRecurso();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    /* ¿ELIMINAR?
    function eliminarActividad_recurso(){
        $query="DELETE FROM `actividad_recursos` WHERE id_actividad_recurso =".$this->getIdActividadRecurso();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    } */

}