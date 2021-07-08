<?php
include_once "conexion.php";

class tipo_actividad extends CONEXION_M
{
    private $id_tipo;
    private $nombre;
    private $estatus_tipo_Ac;
    /**
     * @return mixed
     */
    public function getIdTipo()
    {
        return $this->id_tipo;
    }

    /**
     * @param mixed $id_tipo
     */
    public function setIdTipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;
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
    public function getEstatusTipoAc()
    {
        return $this->estatus_tipo_Ac;
    }

    /**
     * @param mixed $estatus_tipo_Ac
     */
    public function setEstatusTipoAc($estatus_tipo_Ac)
    {
        $this->estatus_tipo_Ac = $estatus_tipo_Ac;
    }


    function listaTipoAc(){
        $query = "SELECT * FROM `tipo_actividad` ORDER BY nombre ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
}