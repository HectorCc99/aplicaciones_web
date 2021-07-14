<?php

include_once "conexion.php";

class horarios extends CONEXION_M
{
    //variables tabla horarios
    private $id_horario;
    private $lunes;
    private $martes;
    private $miercoles;
    private $jueves;
    private $viernes;

    /**
     * @return mixed
     */
    public function getIdHorario()
    {
        return $this->id_horario;
    }

    /**
     * @param mixed $id_horario
     */
    public function setIdHorario($id_horario)
    {
        $this->id_horario = $id_horario;
    }

    /**
     * @return mixed
     */
    public function getLunes()
    {
        return $this->lunes;
    }

    /**
     * @param mixed $lunes
     */
    public function setLunes($lunes)
    {
        $this->lunes = $lunes;
    }

    /**
     * @return mixed
     */
    public function getMartes()
    {
        return $this->martes;
    }

    /**
     * @param mixed $martes
     */
    public function setMartes($martes)
    {
        $this->martes = $martes;
    }

    /**
     * @return mixed
     */
    public function getMiercoles()
    {
        return $this->miercoles;
    }

    /**
     * @param mixed $miercoles
     */
    public function setMiercoles($miercoles)
    {
        $this->miercoles = $miercoles;
    }

    /**
     * @return mixed
     */
    public function getJueves()
    {
        return $this->jueves;
    }

    /**
     * @param mixed $jueves
     */
    public function setJueves($jueves)
    {
        $this->jueves = $jueves;
    }

    /**
     * @return mixed
     */
    public function getViernes()
    {
        return $this->viernes;
    }

    /**
     * @param mixed $viernes
     */
    public function setViernes($viernes)
    {
        $this->viernes = $viernes;
    }

    // funciones propias de la clase

    function agregarHorario(){
        $query="INSERT INTO `horarios` (`id_horario`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`)
                VALUES ('".$this->getIdHorario()."', '".$this->getLunes()."', '".$this->getMartes()."', '".$this->getMiercoles()."', '".$this->getJueves()."', '".$this->getViernes()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function mostrarHorarios(){

        $query="SELECT * FROM `horarios`"; //¿llamar la tabla de grupo y hacer un where con el id?
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function modificarHorario(){
        $query="UPDATE `horarios` SET `lunes`='".$this->getLunes()."', `martes`='".$this->getMartes()."', `miercoles`='".$this->getMiercoles()."', `jueves`='".$this->getJueves()."', `viernes`='".$this->getViernes()."'
                WHERE `id_horario` =".$this->getIdHorario(); //¿llamar la tabla de grupo y hacer un where con el id?
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function borrarHorario(){
        $query="DELETE FROM `horarios` WHERE `id_horario`=".$this->getIdHorario(); //¿llamar la tabla de grupo y hacer un where con el id?
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}