<?php
include "conexion.php";

class actividades_deportivas extends CONEXION_M
{
    //variables actividad
    private $id_actividad;
    private $id_administrador_fk;
    private $nombre_Act;
    private $descripcion;
    private $fecha_creacion;
    private $estatus_actividad;
    private $tipo_actividad;
    private $estatus_Actividad;

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
    public function getNombreAct()
    {
        return $this->nombre_Act;
    }

    /**
     * @param mixed $nombre_Act
     */
    public function setNombreAct($nombre_Act)
    {
        $this->nombre_Act = $nombre_Act;
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
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * @param mixed $fecha_creacion
     */
    public function setFechaCreacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }

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
    public function setEstatusActividad($estatus_actividad)
    {
        $this->estatus_actividad = $estatus_actividad;
    }

    /**
     * @return mixed
     */
    public function getTipoActividad()
    {
        return $this->tipo_actividad;
    }

    /**
     * @param mixed $tipo_actividad
     */
    public function setTipoActividad($tipo_actividad)
    {
        $this->tipo_actividad = $tipo_actividad;
    }
 // funciones de la clase actividades deportivas
    function ListactividadDeport($filtro,$tipo)
    {
        $filtro_estatus="";
        $filtro_tipo=$tipo>0? " AND tipo_actividad=".$tipo:"";
        // 0 todos, 1 activos, 2 inactivos
        switch ($filtro){
            case "1":
                $filtro_estatus= " AND `estatus_actividad`= 1";
                break;
            case "2":
                $filtro_estatus=" AND `estatus_actividad`= 0";
                break;
            default:
                $filtro_estatus="";
                break;
        }
        $query = "SELECT ar.*, tp.* FROM actividad_recreativa ar, tipo_actividad tp WHERE
                    ar.tipo_actividad=tp.id_tipo ".$filtro_tipo."
                    ".$filtro_estatus."  ORDER BY ar.nombre_actividad ASC ";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function subirImagen($nombreArchivo, $Archivo)
    {
        $carpeta = "../img";
        $carpeta2="./img";
        if (!file_exists($carpeta)) {
            if(!mkdir("$carpeta", 0777, true) ){
                echo "error al crear la carpeta";
            }
        }
        $ruta = $carpeta. '/' .$nombreArchivo;
        $ruta2=$carpeta2. '/' .$nombreArchivo;
        if(move_uploaded_file($Archivo, $ruta)){
            return $ruta2;
        }else{
            return false;
        }

    }

    function ListactividadDeportivas($tipo)
    {
        $filtro_tipo=$tipo>0? " AND tipo_actividad=".$tipo:"";

        $query = "SELECT ar.*, tp.*,hr.*,grp.*,er.* FROM actividad_recreativa ar, tipo_actividad tp, horarios hr, grupo grp, espacio_recreativo er WHERE
					hr.id_horario=grp.id_horario
                    and grp.id_actividad=ar.id_actividad
                    and er.id_espacio=grp.id_espacio
                    ".$filtro_tipo."                                                                                                          
                    and ar.tipo_actividad=tp.id_tipo
                    and grp.estatus_grupo =1 ORDER BY ar.nombre_actividad ASC ";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function listdepto($filtro){
        $filtro_estatus="";
        // 0 todos, 1 activos, 2 inactivos
        switch ($filtro){
            case "1":
                $filtro_estatus= " AND ar.`estatus_actividad`= 1";
                break;
            case "2":
                $filtro_estatus=" AND ar.`estatus_actividad`= 0";
                break;
            default:
                $filtro_estatus="";
                break;
        }
        $query = "SELECT ar.*, tp.* FROM actividad_recreativa ar, tipo_actividad tp WHERE
                    ar.tipo_actividad=tp.id_tipo
                     ".$filtro_estatus." ORDER BY nombre_actividad ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function agregaActividadDepot($path){
        $query ="INSERT INTO `actividad_recreativa`(`id_actividad`, `id_administrador`, 
                              `nombre_actividad`, `descripcion`, `fecha_creacion`, `tipo_actividad`, `estatus_actividad`,`img`) 
                              VALUES (NULL,'".$this->getIdAdministradorFk()."','".$this->getNombreAct()."','".$this->getDescripcion()."',
                              '".date('Y-m-d H:i:s')."','".$this->getTipoActividad()."','".$this->getEstatusActividad()."','".$path."');";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function Estatus_actividad(){
        $query ="UPDATE `actividad_recreativa` SET `estatus_actividad`='".$this->getEstatusActividad()."' WHERE `id_actividad`=".$this->getIdActividad();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function DetallesActividasd($id_actividad){
        $query = "SELECT * FROM `actividad_recreativa` WHERE id_actividad=".$id_actividad;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function modificaActividad(){
        $query="UPDATE `actividad_recreativa` SET `nombre_actividad`='".$this->getNombreAct()."',`descripcion`='".$this->getDescripcion()."'
                        ,`tipo_actividad`='".$this->getTipoActividad()."' WHERE `id_actividad` = ".$this->getIdActividad();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}