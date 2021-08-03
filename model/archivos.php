<?php
include_once "conexion.php";

class archivos extends CONEXION_M
{
    private $id_archivo;
    private $id_usuario;
    private $id_admin;
    private $nombre_archivo;
    private $path_archivo;
    private $fecha_aprobacion;
    private $estatus_aprobado;
    private $notas;
    private $semestre;
    private $tipo_archivo;

    /**
     * @return mixed
     */
    public function getTipoArchivo()
    {
        return $this->tipo_archivo;
    }

    /**
     * @param mixed $tipo_archivo
     */
    public function setTipoArchivo($tipo_archivo): void
    {
        $this->tipo_archivo = $tipo_archivo;
    }

    /**
     * @return mixed
     */
    public function getIdArchivo()
    {
        return $this->id_archivo;
    }

    /**
     * @param mixed $id_archivo
     */
    public function setIdArchivo($id_archivo): void
    {
        $this->id_archivo = $id_archivo;
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
    public function setIdUsuario($id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

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
    public function setIdAdmin($id_admin): void
    {
        $this->id_admin = $id_admin;
    }

    /**
     * @return mixed
     */
    public function getNombreArchivo()
    {
        return $this->nombre_archivo;
    }

    /**
     * @param mixed $nombre_archivo
     */
    public function setNombreArchivo($nombre_archivo): void
    {
        $this->nombre_archivo = $nombre_archivo;
    }

    /**
     * @return mixed
     */
    public function getPathArchivo()
    {
        return $this->path_archivo;
    }

    /**
     * @param mixed $path_archivo
     */
    public function setPathArchivo($path_archivo): void
    {
        $this->path_archivo = $path_archivo;
    }

    /**
     * @return mixed
     */
    public function getFechaAprobacion()
    {
        return $this->fecha_aprobacion;
    }

    /**
     * @param mixed $fecha_aprobacion
     */
    public function setFechaAprobacion($fecha_aprobacion): void
    {
        $this->fecha_aprobacion = $fecha_aprobacion;
    }

    /**
     * @return mixed
     */
    public function getEstatusAprobado()
    {
        return $this->estatus_aprobado;
    }

    /**
     * @param mixed $estatus_aprobado
     */
    public function setEstatusAprobado($estatus_aprobado): void
    {
        $this->estatus_aprobado = $estatus_aprobado;
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
    public function setNotas($notas): void
    {
        $this->notas = $notas;
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
    public function setSemestre($semestre): void
    {
        $this->semestre = $semestre;
    }

    // FUNCIONES
    // Agregar a la base de datos
    function agregar_documentos()
    {
        $query = "INSERT INTO `archivos`(`id_archivo`, `id_usuario`, `id_administrador`, `nombre_archivo`, `path_archivo`, `fecha_aprobacion`, `notas`, `semestre`, `estatus_aprobado`, `tipo_archivo`) 
                    VALUES (null,'" . $this->getIdUsuario() . "',null,'" . $this->getNombreArchivo() . "','" . $this->getPathArchivo() . "','" . date('Y-m-d H:i:s') . "'
                    ,'" . $this->getNotas() . "','" . $this->getSemestre() . "','0','".$this->getTipoArchivo()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    // sube el archivo a una carpeta
    function subir_Archivo($id_usuario,$nombreArchivo,$Archivo)
    {
        $carpeta = "../control/archivos_subidos/".$id_usuario;
        if (!file_exists($carpeta)) {
            if(!mkdir("$carpeta", 0777, true) ){
                echo "error al crear la carpeta";
            }
        }
        $ruta = $carpeta .'/'.$nombreArchivo;
        if(move_uploaded_file($Archivo, $ruta)){
            return $ruta;
        }else{
            return false;
        }

    }

    function eliminararchivoBD()
    {
        $query = "DELETE FROM `archivos` WHERE `id_archivo`=" . $this->getIdArchivo();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function eliminararchivopath($path)
    {
        if (unlink($path)) {
            return true;
        } else {
            return false;
        }
    }

    function consultadocumentosp()
    {

        $query = "SELECT ar.*,c.id_carrera,c.nombre as carrera,u.* FROM archivos ar , usuario u, carreras c WHERE ar.id_usuario=u.id_usuario and u.id_carrera = c.id_carrera and ar.estatus_aprobado=0 GROUP BY u.id_usuario ORDER BY u.id_usuario ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function consultadocumentos(){

        $query = "SELECT ar.*,c.nombre as carrera,u.* FROM archivos ar , usuario u, carreras c WHERE ar.id_usuario=u.id_usuario and u.id_carrera = c.id_carrera  ORDER BY u.id_usuario ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function  consultadocumentosr(){
        $query = "SELECT ar.*,c.nombre as carrera,u.* FROM archivos ar , usuario u, carreras c WHERE ar.id_usuario=u.id_usuario and u.id_carrera = c.id_carrera and ar.estatus_aprobado= 1 GROUP BY u.id_usuario ORDER BY u.id_usuario ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function  consultadocumentosUsuario($estatus){
        $estatus2=$estatus==1?"and ar.estatus_aprobado >0 ":"and ar.estatus_aprobado=$estatus";
        $query = "SELECT ar.*,c.nombre as carrera,u.* FROM archivos ar , usuario u, carreras c WHERE ar.id_usuario=u.id_usuario and u.id_carrera = c.id_carrera ".$estatus2." and u.`id_usuario`=".$this->getIdUsuario();
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function ModificaEstatusARchivo(){
        $query = "UPDATE `archivos` SET `id_administrador`='".$this->getIdAdmin()."', `notas`='".$this->getNotas()."',`estatus_aprobado`='".$this->getEstatusAprobado()."' WHERE  `id_archivo`=".$this->getIdArchivo()." AND `id_usuario`=".$this->getIdUsuario();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function verEstadoDocAlumno(){
        $query="SELECT  a.nombre_archivo, a.estatus_aprobado, a.notas
                FROM archivos a, usuario u
                WHERE a.id_usuario = u.id_usuario
                AND u.id_usuario ='".$this->getIdUsuario()."'
                ORDER BY id_archivo DESC LIMIT 4";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
//Estatus archivo
    function estatusCredencial(){
        $query="SELECT a.id_archivo, a.tipo_archivo, a.estatus_aprobado
                FROM archivos a, usuario u
                WHERE a.id_usuario = u.id_usuario
                AND tipo_archivo = 'Credencial_escolar' AND estatus_aprobado = 1  
                AND a.semestre=(SELECT MAX(semestre) FROM archivos)
                AND u.id_usuario ='".$this->getIdUsuario()."'";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function archivosAceptados(){
        $query="SELECT a.id_archivo, a.tipo_archivo, a.estatus_aprobado
                FROM archivos a, usuario u
                WHERE a.id_usuario = u.id_usuario
                AND estatus_aprobado = 1
                AND tipo_archivo IN ('Tira de Materias','Seguro de estudiante','Seguro Axa','Credencial_escolar') 
                AND a.semestre=(SELECT MAX(semestre) FROM archivos)
                AND u.id_usuario ='".$this->getIdUsuario()."'";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
}