<?php
include"conexion.php";

class administrador extends CONEXION_M
{
    private $id_admin;
    private $id_usuario_fx;
    private $fecha_alta;
    private $estatus_admin;
    /**
     * @return mixed
     */
    public function getIdAdmin()
    {
        return $this->id_admin;
    }

    /**
     * @param mixed $id_admin
     */
    public function setIdAdmin($id_admin)
    {
        $this->id_admin = $id_admin;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarioFx()
    {
        return $this->id_usuario_fx;
    }

    /**
     * @param mixed $id_usuario_fx
     */
    public function setIdUsuarioFx($id_usuario_fx)
    {
        $this->id_usuario_fx = $id_usuario_fx;
    }

    /**
     * @return mixed
     */
    public function getFechaAlta()
    {
        return $this->fecha_alta;
    }

    /**
     * @param mixed $fecha_alta
     */
    public function setFechaAlta($fecha_alta)
    {
        $this->fecha_alta = $fecha_alta;
    }

    /**
     * @return mixed
     */
    public function getEstatusAdmin()
    {
        return $this->estatus_admin;
    }

    /**
     * @param mixed $estatus_admin
     */
    public function setEstatusAdmin($estatus_admin)
    {
        $this->estatus_admin = $estatus_admin;
    }

    /*Funciones de la clase administrador*/
    function agregar_admin(){
        $query="INSERT INTO `administrador`(`id_admin`, `id_usuario`, `fecha_alta`, `estatus_admin`) 
        VALUES (NULL,'".$this->getIdUsuarioFx()."','".date('Y-m-d')."','".$this->getEstatusAdmin() ."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function buscarIdUsuarioFK($idUsuarioFK){
        $query= "SELECT u.nombre, u.primer_ap, u.segundo_ap,  a.*  FROM administrador a, usuario  u 
        WHERE u.id_usuario=a.id_usuario AND a.id_usuario='".$idUsuarioFK."' AND a.estatus_admin= 1";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function cambiar_estatus(){
        $query="UPDATE `administrador` SET `estatus_admin`='".$this->getEstatusAdmin()."' WHERE `id_admin`='".$this->getIdAdmin()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function listaAdmin($tipoEstado){
        //Activos 1 o inactivos 0

        switch ($tipoEstado){
            case "1":
                $consultaEstatus= "AND `estatus_admin` = 1";
                break;
            case "2":
                $consultaEstatus= "AND `estatus_admin` = 0";
                break;
            default:
                $consultaEstatus= " ";
                break;
        }
        $query="SELECT u.nombre, u.primer_ap, u.segundo_ap,  a.*  FROM administrador a, usuario u
        WHERE a.id_usuario=u.id_usuario ".$consultaEstatus." ORDER by fecha_alta";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;

    }
    function eliminarAdministrador(){
        $query="DELETE FROM `administrador` WHERE `id_admin`='".$this->getIdAdmin()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function buscarAdmin($idAdmin){
        $query= "SELECT u.nombre, u.primer_ap, u.segundo_ap,  a.*  FROM administrador a, usuario  u 
        WHERE u.id_usuario=a.id_usuario AND a.id_admin=".$idAdmin." AND a.estatus_admin=1";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function actualizarAdmin(){
        $query="UPDATE `administrador` SET `id_usuario`='".$this->getIdUsuarioFx()."',
        `fecha_alta`='".$this->getFechaAlta()."',`estatus_admin`='".$this->getEstatusAdmin()."'WHERE `id_admin`='".$this->getIdAdmin()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function detallesusuarioAdmin(){
        $query="SELECT u.nombre, u.primer_ap, u.segundo_ap, u.cuenta, u.correo, u.telefono, u.id_usuario, a.id_admin
                FROM usuario u, administrador a 
                WHERE u.id_usuario = a.id_usuario
                AND a.id_admin =".$this->getIdAdmin();
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
}