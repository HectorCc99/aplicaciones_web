<?php

include"conexion.php";

class grupo extends CONEXION_M
{
    private $id_grupo;
    private $id_actividad;
    private $grupo;
    private $cupo;
    private $profesor;
    private $id_espacio_fk;
    private $estatus_grupo;
    private $id_horario_fk;
    private $semestre;
    private $correo;
    private $tel_profesor;

    /**
     * @return mixed
     */
    public function getIdGrupo()
    {
        return $this->id_grupo;
    }

    /**
     * @param mixed $id_grupo
     */
    public function setIdGrupo($id_grupo)
    {
        $this->id_grupo = $id_grupo;
    }

    /**
     * @return mixed
     */
    public function getIdActividad()
    {
        return $this->id_actividad;
    }

    /**
     * @param mixed $id_actividad
     */
    public function setIdActividad($id_actividad)
    {
        $this->id_actividad = $id_actividad;
    }

    /**
     * @return mixed
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param mixed $grupo
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
    }

    /**
     * @return mixed
     */
    public function getCupo()
    {
        return $this->cupo;
    }

    /**
     * @param mixed $cupo
     */
    public function setCupo($cupo)
    {
        $this->cupo = $cupo;
    }

    /**
     * @return mixed
     */
    public function getProfesor()
    {
        return $this->profesor;
    }

    /**
     * @param mixed $profesor
     */
    public function setProfesor($profesor)
    {
        $this->profesor = $profesor;
    }

    /**
     * @return mixed
     */
    public function getIdEspacioFk()
    {
        return $this->id_espacio_fk;
    }

    /**
     * @param mixed $id_espacio_fk
     */
    public function setIdEspacioFk($id_espacio_fk)
    {
        $this->id_espacio_fk = $id_espacio_fk;
    }

    /**
     * @return mixed
     */
    public function getEstatusGrupo()
    {
        return $this->estatus_grupo;
    }

    /**
     * @param mixed $estatus_grupo
     */
    public function setEstatusGrupo($estatus_grupo)
    {
        $this->estatus_grupo = $estatus_grupo;
    }

    /**
     * @return mixed
     */
    public function getIdHorarioFk()
    {
        return $this->id_horario_fk;
    }

    /**
     * @param mixed $id_horario_fk
     */
    public function setIdHorarioFk($id_horario_fk)
    {
        $this->id_horario_fk = $id_horario_fk;
    }

    /**
     * @return mixed
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * @param mixed $semestre
     */
    public function setSemestre($semestre)
    {
        $this->semestre = $semestre;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getTelProfesor()
    {
        return $this->tel_profesor;
    }

    /**
     * @param mixed $tel_profesor
     */
    public function setTelProfesor($tel_profesor)
    {
        $this->tel_profesor = $tel_profesor;
    }

    //funciones propias de la clase

    //Listar todos los grupos
    function mostrarGrupos(){
        // todos, activos, inactivos
        //funcion para la vista de admin-horarios y grupos
        $query="SELECT gr.*, ar.nombre_actividad, er.nombre_espacio, h.* FROM grupo gr, actividad_recreativa ar, espacio_recreativo er, horarios h 
                WHERE gr.id_actividad=ar.id_actividad AND gr.id_espacio=er.id_espacio AND gr.id_horario=h.id_horario ORDER BY gr.grupo ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    //Mostrar un registro en especifico para editas (?)
    function mostrarGrupo(){
        $query="SELECT gr.*, ar.nombre_actividad, er.nombre_espacio, h.* 
FROM grupo gr, actividad_recreativa ar, espacio_recreativo er, horarios h 
                WHERE gr.id_actividad=ar.id_actividad AND gr.id_espacio=er.id_espacio AND gr.id_horario=h.id_horario AND gr.id_grupo=".$this->getIdGrupo();
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function agregarGrupo(){
        $query="INSERT INTO `grupo` (`id_grupo`, `id_actividad`, `grupo`, `cupo`, `profesor`,
                                    `id_espacio`, `id_horario`, `semestre`, `estatus_grupo`, `telefono_prof`) 
		                    VALUES (NULL, '".$this->getIdActividad()."', '".$this->getGrupo()."', '".$this->getCupo()."', '".$this->getProfesor()."',
		                            '".$this->getIdEspacioFk()."', '".$this->getIdHorarioFk()."', '".$this->getSemestre()."', '".$this->getEstatusGrupo()."', '".$this->getTelProfesor()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function modificarGrupo(){
        $query="UPDATE `grupo` SET `grupo`='".$this->getGrupo()."', `cupo`='".$this->getCupo()."', `id_espacio`='".$this->getIdEspacioFk()."', `id_horario`='".$this->getIdHorarioFk()."',`profesor`='".$this->getProfesor()."', `semestre`='".$this->getSemestre()."', `telefono_prof`='".$this->getTelProfesor()."'
                WHERE `id_grupo`=".$this->getIdGrupo();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function Estatus_Grupo(){
        $query="UPDATE `grupo` SET `estatus_grupo`='".$this->getEstatusGrupo()."' WHERE id_grupo = ".$this->getIdGrupo();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

}