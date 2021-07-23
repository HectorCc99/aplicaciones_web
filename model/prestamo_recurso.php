<?php
include_once "conexion.php";

class prestamo_recurso extends CONEXION_M
{
    private $id_prestamo;
    private $id_recurso;
    private $id_prestamo_material;
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
    public function getIdRecurso()
    {
        return $this->id_recurso;
    }

    /**
     * @param mixed $id_recurso
     */
    public function setIdRecurso($id_recurso)
    {
        $this->id_recurso = $id_recurso;
    }

    /**
     * @return mixed
     */
    public function getIdPrestamoMaterial()
    {
        return $this->id_prestamo_material;
    }

    /**
     * @param mixed $id_prestamo_material
     */
    public function setIdPrestamoMaterial($id_prestamo_material)
    {
        $this->id_prestamo_material = $id_prestamo_material;
    }
    /*Funciones de la clase*/
    function agregarPrestamoRecursos(){
        $query="INSERT INTO `pres_recurso`(`id_prestamo_ma`, `id_recurso`,`id_prestamo`)
                VALUES (NULL,'".$this->getIdRecurso()."','".$this->getIdPrestamo()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function modificarPrestamoRecurso(){
        $query="UPDATE `pres_recurso` SET `id_recurso`='".$this->getIdRecurso()."',`id_prestamo`='".$this->getIdPrestamo()."' WHERE `id_prestamo_ma`='".$this->getIdPrestamoMaterial()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function eliminarPrestamoRecurso(){
        $query="DELETE FROM `pres_recurso` WHERE `id_prestamo_ma`='".$this->getIdPrestamoMaterial()."'";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function buscarPrestamoRecurso($idPrestamoMat){
        $query="SELECT * FROM `pres_recurso` WHERE `id_prestamo_ma`='".$idPrestamoMat."'";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }


    function historialPrestamoRecurso(){
        $query="SELECT pr.id_prestamo_ma, u.nombre, u.primer_ap, u.segundo_ap,
         p.fecha_prestamo, rr.nombre_recurso, p.hora_inicio, p.hora_fin, p.notas
         FROM pres_recurso pr, usuario u, prestamo p, recurso_recreativo rr
         WHERE pr.id_prestamo=p.id_prestamo AND p.id_usuario=u.id_usuario AND pr.id_recurso=rr.id_recurso
         AND p.estatus_prestamo = '1'
         ORDER BY fecha_prestamo, hora_inicio DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function historialPrestamoRecursoFecha(){
        $query="SELECT p.fecha_prestamo
         FROM pres_recurso pr, usuario u, prestamo p, recurso_recreativo rr
         WHERE pr.id_prestamo=p.id_prestamo AND p.id_usuario=u.id_usuario AND pr.id_recurso=rr.id_recurso  
         AND p.estatus_prestamo='1'
         GROUP BY fecha_prestamo DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function listaDevolucion(){
        //Muestra todos menos los Solicitados (0 Solicitados, 1 Aceptados 2 Rechazados)
        $query="SELECT p.id_prestamo,pr.id_prestamo_ma, u.nombre, u.primer_ap, u.segundo_ap,
         p.fecha_prestamo, rr.nombre_recurso, p.hora_inicio, p.hora_fin, p.estatus_prestamo,p.notas
         FROM pres_recurso pr, usuario u, prestamo p, recurso_recreativo rr
         WHERE pr.id_prestamo=p.id_prestamo AND p.id_usuario=u.id_usuario AND pr.id_recurso=rr.id_recurso
         AND NOT (p.estatus_prestamo=0) AND NOT (p.estatus_prestamo=2)";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function buscarPrestamoMatPorId($id_prestamo){

        $query="SELECT p.id_prestamo,pr.id_prestamo_ma, u.nombre, u.primer_ap, u.segundo_ap,
         p.fecha_prestamo, rr.nombre_recurso, p.hora_inicio, p.hora_fin, p.estatus_prestamo,p.notas
         FROM pres_recurso pr, usuario u, prestamo p, recurso_recreativo rr
         WHERE pr.id_prestamo=p.id_prestamo AND p.id_prestamo=".$id_prestamo."
         AND p.id_usuario=u.id_usuario AND pr.id_recurso=rr.id_recurso";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function listaSolicitudes($id_recurso){ //para mostrar todos los que estan pendientes de ser aceptados
        $query="SELECT p.*, rr.*, u.* FROM prestamo p, pres_recurso pr, recurso_recreativo rr, usuario u
                 WHERE p.id_prestamo=pr.id_prestamo
                 AND pr.id_recurso=rr.id_recurso
                 AND p.id_usuario=u.id_usuario
                 AND p.estatus_prestamo=0
                 AND rr.id_recurso=".$id_recurso;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function filtroPorFecha($filtro, $fecha){
            //Muestra los solicitudes (0 Solicitados, 1 Aceptados 2 Rechazados)
        switch ($filtro){
            case "1":
                $filtro2= " AND p.estatus_prestamo = 0";
                break;
            case "2":
                $filtro2= " AND p.estatus_prestamo = 1";
                break;
            case "3":
                $filtro2= " AND p.estatus_prestamo = 2";
                break;
            default:
                $filtro2= " ";
                break;
        }
        $query="SELECT pr.id_prestamo_ma, u.nombre, u.primer_ap, u.segundo_ap,
         p.fecha_prestamo, rr.nombre_recurso, p.hora_inicio, p.hora_fin, p.notas
         FROM pres_recurso pr, usuario u, prestamo p, recurso_recreativo rr
         WHERE pr.id_prestamo=p.id_prestamo AND p.id_usuario=u.id_usuario AND pr.id_recurso=rr.id_recurso ".$filtro2."
         AND p.fecha_prestamo='".$fecha."'
         ORDER BY fecha_prestamo, hora_inicio DESC";
            $this->connect();
            $result = $this->getData($query);
            $this->close();
            return $result;

    }
    function filtroPorMaterial($filtro,$material){
        //Muestra los solicitudes (0 Solicitados, 1 Aceptados 2 Rechazados)
        switch ($filtro){
            case "1":
                $filtro2= "AND p.estatus_prestamo = 0";
                break;
            case "2":
                $filtro2= "AND p.estatus_prestamo = 1";
                break;
            case "3":
                $filtro2= "AND p.estatus_prestamo = 2";
                break;
            default:
                $filtro2= " ";
                break;
        }
        $query="SELECT pr.id_prestamo_ma, u.nombre, u.primer_ap, u.segundo_ap,
         p.fecha_prestamo, rr.nombre_recurso, p.hora_inicio, p.hora_fin, p.notas
         FROM pres_recurso pr, usuario u, prestamo p, recurso_recreativo rr
         WHERE pr.id_prestamo=p.id_prestamo AND p.id_usuario=u.id_usuario AND pr.id_recurso=rr.id_recurso ".$filtro2."
         AND pr.id_recurso='".$material."'
         ORDER BY nombre_recurso, fecha_prestamo, hora_inicio DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;

    }
    function filtroPorMaterialYFecha($filtro,$material,$fecha){
        //Muestra los solicitudes (0 Solicitados, 1 Aceptados 2 Rechazados)
        switch ($filtro){
            case "1":
                $filtro2= "AND p.estatus_prestamo = 0";
                break;
            case "2":
                $filtro2= "AND p.estatus_prestamo = 1";
                break;
            case "3":
                $filtro2= "AND p.estatus_prestamo = 2";
                break;
            default:
                $filtro2= " ";
                break;
        }
        $query="SELECT pr.id_prestamo_ma, u.nombre, u.primer_ap, u.segundo_ap,
         p.fecha_prestamo, rr.nombre_recurso, p.hora_inicio, p.hora_fin, p.notas
         FROM pres_recurso pr, usuario u, prestamo p, recurso_recreativo rr
         WHERE pr.id_prestamo=p.id_prestamo AND p.id_usuario=u.id_usuario AND pr.id_recurso=rr.id_recurso ".$filtro2."
         AND pr.id_recurso='".$material."' AND p.fecha_prestamo='".$fecha."'
       ORDER BY nombre_recurso, fecha_prestamo, hora_inicio DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;

    }
}