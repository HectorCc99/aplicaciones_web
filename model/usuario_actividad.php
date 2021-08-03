<?php
include_once "conexion.php";


class usuario_actividad extends CONEXION_M
{
    private $id_inscripcion;
    private $id_usuario ;
    private $id_actividad;
    private $asistencia;
    private $fecha_inscripcion;
    private  $año;
    private $estatus_actividad;

    /**
     * @return mixed
     */
    public function getEstatusActividad()
    {
        return $this->estatus_actividad;
    }

    /**
     * @param mixed $estatus_actividad
     */
    public function setEstatusActividad($estatus_actividad): void
    {
        $this->estatus_actividad = $estatus_actividad;
    }

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
    /**
     * @return mixed
     */
    public function getIdInscripcion()
    {
        return $this->id_inscripcion;
    }

    /**
     * @param mixed $id_inscripcion
     */
    public function setIdInscripcion($id_inscripcion): void
    {
        $this->id_inscripcion = $id_inscripcion;
    }
    // funciones propias
    function crearinscripcion(){
        $query = "INSERT INTO `usuario_actividad` (`id_inscripcion`, `id_usuario`, `id_grupo`, `asistencia`, `fecha_inscripcion`, `año`, `estatus_inscripcion`) 
                        VALUES ('".$this->getIdUsuario().$this->getIdActividad().$this->getAño()."', '".$this->getIdUsuario()."', '".$this->getIdActividad()."', 
                        '".$this->getAsistencia()."', '".date('Y-m-d H:i:s')."', '".$this->getAño()."', '0');";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function verinscripcionesA($id_d,$id_g){
        $query = "SELECT ua.id_inscripcion,u.nombre,u.primer_ap,u.segundo_ap,u.cuenta, u.correo,u.telefono, c.nombre as carrera, ar.nombre_actividad,ar.descripcion, ua.fecha_inscripcion 
                    FROM usuario_actividad ua, usuario u , actividad_recreativa ar, grupo gp, carreras c
                        WHERE u.id_usuario=ua.id_usuario
                          AND c.id_carrera=u.id_carrera
                          AND ua.id_grupo = gp.id_grupo
                          and gp.id_actividad = ar.id_actividad
                          AND ua.estatus_inscripcion = 1
                          AND ar.id_actividad = ".$id_d." 
                      AND ua.id_grupo =".$id_g;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function verinscripcionesP($id_d,$id_g){
        $query = "SELECT ua.id_inscripcion,u.nombre,u.primer_ap,u.segundo_ap, u.correo,ua.fecha_inscripcion, 
                    ar.nombre_actividad,ar.descripcion 
                    FROM usuario_actividad ua, usuario u , actividad_recreativa ar, grupo gp 
                    WHERE u.id_usuario=ua.id_usuario AND ua.id_grupo = gp.id_grupo 
                      and gp.id_actividad = ar.id_actividad AND ua.estatus_inscripcion = 0 
                      AND ar.id_actividad = ".$id_d." 
                      AND ua.id_grupo =".$id_g;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function cambiar_asistencia(){
        $query = "UPDATE `usuario_actividad` SET `asistencia`='".$this->getAsistencia()."' WHERE  id_inscripcion ='".$this->getIdInscripcion()."' ";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function cambiar_estatus(){
        $query = "UPDATE `usuario_actividad` SET `estatus_inscripcion`='".$this->getEstatusActividad()."', `fecha_inscripcion` ='".date('Y-m-d H:i')."' WHERE  id_inscripcion ='".$this->getIdInscripcion()."' ";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function borrarinscripcion(){
        $query = "DELETE FROM `usuario_actividad` WHERE id_inscripcion = '".$this->getIdInscripcion()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function verinscripciones(){
        $query = "SELECT ua.id_inscripcion,u.nombre,u.primer_ap,u.segundo_ap, u.correo, ar.nombre_actividad,ar.descripcion  
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
                        AND ua.id_inscripcion='".$this->getIdInscripcion()."'";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    //para solo un usuario (historial de inscripciones, todas de momento)
    function verIncripcionesAnteriores(){
        //u.nombre, u.primer_ap, u.segundo_ap, si dejo el nombre de usuario lo confunde con ta.nombre
        $query = "SELECT  ar.nombre_actividad, ta.nombre, g.grupo, ua.año
                FROM usuario u, actividad_recreativa ar, tipo_actividad ta, grupo g, usuario_actividad ua
                WHERE u.id_usuario = ua.id_usuario
                AND ar.id_actividad = g.id_actividad
                AND ar.tipo_actividad = ta.id_tipo
		        AND g.semestre = ua.año
                AND ua.estatus_inscripcion = 1
                AND g.id_grupo = ua.id_grupo
                AND ua.año!=(SELECT MAX(ua.año) FROM usuario_actividad ua)
                AND ua.id_usuario ='".$this->getIdUsuario()."'ORDER BY ua.año DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    //para un solo usuario (incripciones del semestre actual)
    function verIncripcionesActuales(){
        //u.nombre, u.primer_ap, u.segundo_ap, si dejo el nombre de usuario lo confunde con ta.nombre
        $query = "SELECT g.profesor, g.grupo, h.*, ar.nombre_actividad,ar.img as img_deporte, ar.descripcion, ta.nombre, er.nombre_espacio, MAX(ua.año)
                    FROM grupo g, horarios h, actividad_recreativa ar, tipo_actividad ta, usuario_actividad ua, usuario u, espacio_recreativo er
                    WHERE g.id_grupo = ua.id_grupo
                    AND g.id_actividad = ar.id_actividad
                    AND g.id_espacio = er.id_espacio
                    AND g.id_horario = h.id_horario
                    AND ar.tipo_actividad = ta.id_tipo
                    AND g.semestre = ua.año
                    AND ua.estatus_inscripcion = 1
                    AND ua.id_usuario = u.id_usuario
                    AND u.id_usuario ='".$this->getIdUsuario()."'";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
}