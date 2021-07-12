<?php

include"conexion.php";

class eventos extends CONEXION_M
{
    private $id_evento;
    private $id_administrador_fk;
    private $id_espacio_r_fk;
    private $id_recurso_fk;
    private $nombre_actividad;
    private $descripcion;
    private $encargado;
    private $tel_encargado;
    private $semestre_ev;
    private $cupo_ev;
    private $imagen;
    private $cantidad_recurso;
    private $estatus_evento;
    private $fecha_inicio;
    private $fecha_fin;
    private $hora_inicio;
    private $hora_fin;

    /**
     * @return mixed
     */
    public function getIdEvento()
    {
        return $this->id_evento;
    }

    /**
     * @param mixed $id_evento
     */
    public function setIdEvento($id_evento)
    {
        $this->id_evento = $id_evento;
    }

    /**
     * @return mixed
     */
    public function getIdAdministradorFk()
    {
        return $this->id_administrador_fk;
    }

    /**
     * @param mixed $id_administrador_fk
     */
    public function setIdAdministradorFk($id_administrador_fk)
    {
        $this->id_administrador_fk = $id_administrador_fk;
    }

    /**
     * @return mixed
     */
    public function getIdEspacioRFk()
    {
        return $this->id_espacio_r_fk;
    }

    /**
     * @param mixed $id_espacio_r_fk
     */
    public function setIdEspacioRFk($id_espacio_r_fk)
    {
        $this->id_espacio_r_fk = $id_espacio_r_fk;
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
    public function getNombreActividad()
    {
        return $this->nombre_actividad;
    }

    /**
     * @param mixed $nombre_actividad
     */
    public function setNombreActividad($nombre_actividad)
    {
        $this->nombre_actividad = $nombre_actividad;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getEncargado()
    {
        return $this->encargado;
    }

    /**
     * @param mixed $encargado
     */
    public function setEncargado($encargado)
    {
        $this->encargado = $encargado;
    }

    /**
     * @return mixed
     */
    public function getTelEncargado()
    {
        return $this->tel_encargado;
    }

    /**
     * @return mixed
     */
    public function getSemestreEv()
    {
        return $this->semestre_ev;
    }/**
     * @param mixed $semestre_ev
     */
    public function setSemestreEv($semestre_ev)
    {
        $this->semestre_ev = $semestre_ev;
    }/**
     * @return mixed
     */
    public function getCupoEv()
    {
        return $this->cupo_ev;
    }/**
     * @param mixed $cupo_ev
     */
    public function setCupoEv($cupo_ev)
    {
        $this->cupo_ev = $cupo_ev;
    }

    /**
     * @param mixed $tel_encargado
     */
    public function setTelEncargado($tel_encargado)
    {
        $this->tel_encargado = $tel_encargado;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * @return mixed
     */
    public function getCantidadRecurso()
    {
        return $this->cantidad_recurso;
    }

    /**
     * @param mixed $cantidad_recurso
     */
    public function setCantidadRecurso($cantidad_recurso)
    {
        $this->cantidad_recurso = $cantidad_recurso;
    }

    /**
     * @return mixed
     */
    public function getEstatusEvento()
    {
        return $this->estatus_evento;
    }

    /**
     * @param mixed $estatus_evento
     */
    public function setEstatusEvento($estatus_evento)
    {
        $this->estatus_evento = $estatus_evento;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @param mixed $fecha_fin
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    /**
     * @return mixed
     */
    public function getHoraInicio()
    {
        return $this->hora_inicio;
    }

    /**
     * @param mixed $hora_inicio
     */
    public function setHoraInicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;
    }

    /**
     * @return mixed
     */
    public function getHoraFin()
    {
        return $this->hora_fin;
    }

    /**
     * @param mixed $hora_fin
     */
    public function setHoraFin($hora_fin)
    {
        $this->hora_fin = $hora_fin;
    }

    //Funciones propias de la clase


    //Falta el campo de semestre y cupo en la tabla de eventos de la bd
    function listarEventos($filtro){
        $query = "SELECT e.nombre_actividad, e.encargado, e.telefono_encargado, e.semestre, e.cupo, er.nombre_espacio 
                    FROM eventos e, espacio_recreativo er WHERE e.id_espacio_r = er.id_espacio";
                    //consulta para la vista de Admin: Eventos
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function agregarEvento(){
        $query= "INSERT INTO `eventos` (`id_evento`, `id_administrador`, `id_espacio_r`, `id_recurso`, `nombre_actividad`,
                                        `descripcion`, `encargado`, `telefono_encargado`, `semestre`, `cupo`, 
                                        `imagen`, `cantidad_recurso`, `estatus_evento`, `fecha_inicio`, `fecha_fin`,
                                        `hora_inicio`, `hora_fin`) 
                                VALUES (NULL, '".$this->getIdAdministradorFk()."', '".$this->getIdEspacioRFk()."', '".$this->getIdRecursoFk()."', '".$this->getNombreActividad()."',
                                            '".$this->getDescripcion()."', '".$this->getEncargado()."', '".$this->getTelEncargado()."', '".$this->getSemestreEv()."', '".$this->getCupoEv()."',
                                            '".$this->getImagen()."', '".$this->getCantidadRecurso()."', '".$this->getEstatusEvento()."','".$this->getFechaInicio()."','".$this->getFechaFin()."',
                                            '".$this->getHoraInicio()."','".$this->getHoraFin()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function modificarEvento(){
        $query="UPDATE `eventos` SET `nombre_actividad`='".$this->getNombreActividad()."',`descripcion`='".$this->getDescripcion()."',
                                    `encargado`='".$this->getEncargado()."', `telefono_encargado`= '".$this->getTelEncargado()."',
                                    `semestre`='".$this->getSemestreEv()."', `cupo`='".$this->getCupoEv()."', `imagen`='".$this->getImagen()."',
                                    `cantidad_recurso`='".$this->getCantidadRecurso()."',  `estatus_evento`='".$this->getEstatusEvento()."',
                                    `fecha_inicio`='".$this->getFechaInicio()."', `fecha_fin`='".$this->getFechaFin()."',
                                    `hora_inicio`='".$this->getHoraInicio()."',  `hora_fin`='".$this->getHoraFin()."'  WHERE `id_evento` = ".$this->getIdEvento();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function eliminarEvento(){
        $query="DELETE FROM `eventos` WHERE `id_evento`=".$this->getIdEvento();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

}