<?php
include "conexion.php";


class usuario_actividad extends CONEXION_M
{
    private $id_usuario ;
    private $id_actividad;
    private $asistencia;
    private $fecha_inscripcion;
    private  $año;

    /**
     * @return mixed
     */
    public function getAño()
    {
        return $this->año;
    }

    /**
     * @param mixed $año
     */
    public function setAño($año)
    {
        $this->año = $año;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
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
    public function getAsistencia()
    {
        return $this->asistencia;
    }

    /**
     * @param mixed $asistencia
     */
    public function setAsistencia($asistencia)
    {
        $this->asistencia = $asistencia;
    }

    /**
     * @return mixed
     */
    public function getFechaInscripcion()
    {
        return $this->fecha_inscripcion;
    }

    /**
     * @param mixed $fecha_inscripcion
     */
    public function setFechaInscripcion($fecha_inscripcion)
    {
        $this->fecha_inscripcion = $fecha_inscripcion;
    }
    // funciones propias
    function crearinscripcion(){
        $query = "INSERT INTO `usuario_actividad`(`id_usuario`, `id_grupo`, `asistencia`, `fecha_inscripcion`, `año`) 
                    VALUES ('".$this->getIdUsuario()."','".$this->getIdActividad()."','0','".date('Y-m-d H:i:s')."','".$this->getAño()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function cambiar_asistencia(){
        $query = "UPDATE `usuario_actividad` SET `asistencia`='".$this->getAsistencia()."' WHERE  id_grupo = ".$this->getIdActividad()."  AND id_usuario =".$this->getIdUsuario()." and año='".$this->getAño()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function borrarinscripcion(){
        $query = "DELETE FROM `usuario_actividad` WHERE id_grupo = ".$this->getIdActividad()."  AND id_usuario =".$this->getIdUsuario()." and año= '".$this->getAño()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function verinscripciones(){
        $query = "SELECT u.nombre,u.primer_ap,u.segundo_ap, u.correo, ar.nombre_actividad,ar.descripcion  
                    FROM usuario_actividad ua, usuario u , actividad_recreativa ar, grupo gp
                        WHERE u.id_usuario=ua.id_usuario 
                          AND ua.id_grupo = gp.id_grupo
                        and gp.id_actividad = ar.id_actividad";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function detallesinscripcion(){
        $query = "SELECT u.nombre,u.primer_ap,u.segundo_ap, u.correo, ar.nombre_actividad,ar.descripcion  
                    FROM usuario_actividad ua, usuario u , actividad_recreativa ar, grupo gp
                        WHERE u.id_usuario=ua.id_usuario 
                          AND ua.id_grupo = gp.id_grupo
                        and gp.id_actividad = ar.id_actividad
                        AND ua.id_usuario=".$this->getIdUsuario()."
                        AND ua.id_grupo =".$this->getIdActividad()."
                        AND ua.año='".$this->getAño()."' ";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
}