<?php
include_once "conexion.php";

class usuarios extends CONEXION_M
{
    private $id_usuario;
    private $nombre;
    private $primer_ap;
    private $segundo_ap;
    private $contraseña;
    private $telefono;
    private $celular;
    private $correo;
    private $cuenta;
    private $estatus_usuario;
    private $id_carrera_fk;

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getPrimerAp()
    {
        return $this->primer_ap;
    }

    /**
     * @param mixed $primer_ap
     */
    public function setPrimerAp($primer_ap)
    {
        $this->primer_ap = $primer_ap;
    }

    /**
     * @return mixed
     */
    public function getSegundoAp()
    {
        return $this->segundo_ap;
    }

    /**
     * @param mixed $segundo_ap
     */
    public function setSegundoAp($segundo_ap)
    {
        $this->segundo_ap = $segundo_ap;
    }

    /**
     * @return mixed
     */
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /**
     * @param mixed $contraseña
     */
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
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
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * @param mixed $cuenta
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;
    }

    /**
     * @return mixed
     */
    public function getEstatusUsuario()
    {
        return $this->estatus_usuario;
    }

    /**
     * @param mixed $estatus_usuario
     */
    public function setEstatusUsuario($estatus_usuario)
    {
        $this->estatus_usuario = $estatus_usuario;
    }

    /**
     * @return mixed
     */
    public function getIdCarreraFk()
    {
        return $this->id_carrera_fk;
    }

    /**
     * @param mixed $id_carrera_fk
     */
    public function setIdCarreraFk($id_carrera_fk)
    {
        $this->id_carrera_fk = $id_carrera_fk;
    }

    // funciones propias de la clase

    function agregar_usuario(){
        $query="INSERT INTO `usuario`(`id_usuario`, `nombre`, `primer_ap`, `segundo_ap`, `cuenta`, `correo`, `contrasenia`, `id_carrera`, `estatus_usuario`, `telefono`) 
                VALUES (NULL,'".$this->getNombre()."','".$this->getPrimerAp()."','".$this->getSegundoAp()."','".$this->getCuenta()."','".$this->getCorreo()."'
                ,'".$this->getContraseña()."','".$this->getIdCarreraFk()."','0','".$this->getTelefono()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    // elimina o habilita una cuenta de usuario
    function cambiar_estatus(){
        $query="UPDATE `usuario` SET `estatus_usuario`='".$this->getEstatusUsuario()."' WHERE `id_usuario`='".$this->getIdUsuario()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function modificar_usuario(){
        $query="UPDATE `usuario` SET `nombre`='".$this->getNombre()."',`primer_ap`='".$this->getPrimerAp()."',`segundo_ap`='".$this->getSegundoAp()."',`cuenta`='".$this->getCuenta()."',`correo`='".$this->getCorreo()."'
                    ,`id_carrera`='".$this->getIdCarreraFk()."',`telefono`='".$this->getTelefono()."' WHERE `id_usuario`='".$this->getIdUsuario()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function listausuarios($filtro){
        // 1 activos 2 inactivos 3 todos

        switch ($filtro){
            case "1":
                $filtro2= "AND u.estatus_usuario = 1";
                break;
            case "2":
                $filtro2= "AND u.estatus_usuario = 0";
                break;
            default:
                $filtro2= " ";
                break;
        }
        $query="SELECT u.*, c.nombre as nombre_carrera FROM usuario u, carreras c WHERE c.id_carrera =u.id_carrera ".$filtro2." ORDER by nombre ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function detallesusuario(){
        $query="SELECT u.*, c.nombre as nombre_carrera FROM usuario u, carrerasc WHERE c.id_carrera =u.id_carrera AND
                u.id_usuario=".$this->getIdUsuario();
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }



}