<?php
include_once "conexion.php";

class prestamo extends CONEXION_M
{
    private $id_prestamo;
    private $id_usuarioFK;
    private $id_administradorFK;
    private $fecha_prestamo;
    private $hora_inicio;
    private $hora_fin;
    private $estatus_prestamo;
    private $notas;
    /**
     * @return mixed
     */
    public function getIdPrestamo()
    {
        return $this->id_prestamo;
    }

    /**
     * @param mixed $id_prestamo
     */
    public function setIdPrestamo($id_prestamo)
    {
        $this->id_prestamo = $id_prestamo;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarioFK()
    {
        return $this->id_usuarioFK;
    }

    /**
     * @param mixed $id_usuarioFK
     */
    public function setIdUsuarioFK($id_usuarioFK)
    {
        $this->id_usuarioFK = $id_usuarioFK;
    }

    /**
     * @return mixed
     */
    public function getIdAdministradorFK()
    {
        return $this->id_administradorFK;
    }

    /**
     * @param mixed $id_administradorFK
     */
    public function setIdAdministradorFK($id_administradorFK)
    {
        $this->id_administradorFK = $id_administradorFK;
    }

    /**
     * @return mixed
     */
    public function getFechaPrestamo()
    {
        return $this->fecha_prestamo;
    }

    /**
     * @param mixed $fecha_prestamo
     */
    public function setFechaPrestamo($fecha_prestamo)
    {
        $this->fecha_prestamo = $fecha_prestamo;
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

    /**
     * @return mixed
     */
    public function getEstatusPrestamo()
    {
        return $this->estatus_prestamo;
    }

    /**
     * @param mixed $estatus_prestamo
     */
    public function setEstatusPrestamo($estatus_prestamo)
    {
        $this->estatus_prestamo = $estatus_prestamo;
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

    /*Funciones de la clase
     */
    function agregarPrestamo(){
        $query="INSERT INTO `prestamo`(`id_prestamo`, `id_usuario`, `id_administrador`, `fecha_prestamo`, `hora_inicio`, `hora_fin`, `notas`, `estatus_prestamo`)
        VALUES (NULL,'".$this->getIdUsuarioFK()."',null,'".$this->getFechaPrestamo()."'
        ,'".$this->getHoraInicio()."','".$this->getHoraFin()."','','".$this->getEstatusPrestamo()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function lastid(){
        $query="SELECT MAX(id_prestamo) FROM `prestamo`";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function modificarPrestamo(){
        $query="UPDATE `prestamo` SET `id_usuario`='".$this->getIdUsuarioFK()."',`id_administrador`='".$this->getIdAdministradorFK()."',
                `fecha_prestamo`='".$this->getFechaPrestamo()."',`hora_inicio`='".$this->getHoraInicio()."',
                `hora_fin`='".$this->getHoraFin()."',`notas`='".$this->getNotas()."',
                `estatus_prestamo`='".$this->getEstatusPrestamo()."' WHERE id_prestamo='".$this->getIdPrestamo()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function buscarPrestamo($id_prestamo){
        $query="SELECT * FROM prestamo WHERE id_prestamo=".$id_prestamo;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function eliminarPrestamo(){
        $query="DELETE FROM prestamo WHERE id_prestamo='".$this->getIdPrestamo()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function modificarEstatusPrestamo(){
        $query="UPDATE `prestamo` SET  `estatus_prestamo`='".$this->getEstatusPrestamo()."' WHERE id_prestamo='".$this->getIdPrestamo()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function modificarNotasPrestamo(){
        $query="UPDATE `prestamo` SET  `notas`='".$this->getNotas()."' WHERE id_prestamo='".$this->getIdPrestamo()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}