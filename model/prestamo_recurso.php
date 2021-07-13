<?php
include "conexion.php";

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
        $query="INSERT INTO `pres_recurso`(`id_prestamo_ma`, `id_recurso`,
                `id_prestamo`) VALUES (NULL,'".$this->getIdRecurso()."','".$this->getIdPrestamo()."')";
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
         ORDER BY fecha_prestamo, hora_inicio DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function listaDevolucion(){
        //Muestra todos menos los Solicitados (0 Solicitados, 1 Aceptados 2 Rechazados)
        $query="SELECT pr.id_prestamo_ma, u.nombre, u.primer_ap, u.segundo_ap,
         p.fecha_prestamo, rr.nombre_recurso, p.hora_inicio, p.hora_fin, p.estatus_prestamo,p.notas
         FROM pres_recurso pr, usuario u, prestamo p, recurso_recreativo rr
         WHERE pr.id_prestamo=p.id_prestamo AND p.id_usuario=u.id_usuario AND pr.id_recurso=rr.id_recurso
         AND NOT (p.estatus_prestamo=0) ORDER BY fecha_prestamo, hora_inicio DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function listaSolicitudes(){
        //Muestra los solicitudes (0 Solicitados, 1 Aceptados 2 Rechazados)
        $query="SELECT pr.id_prestamo_ma, u.nombre, u.primer_ap, u.segundo_ap,
         p.fecha_prestamo, p.hora_inicio, p.hora_fin
         FROM pres_recurso pr, usuario u, prestamo p, recurso_recreativo rr
         WHERE pr.id_prestamo=p.id_prestamo AND p.id_usuario=u.id_usuario AND pr.id_recurso=rr.id_recurso
         AND p.estatus_prestamo=0 ORDER BY fecha_prestamo, hora_inicio DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    function filtroPorFecha($fecha){
            //Muestra los solicitudes (0 Solicitados, 1 Aceptados 2 Rechazados)
            $query="SELECT pr.id_prestamo_ma, u.nombre, u.primer_ap, u.segundo_ap,
         p.fecha_prestamo, p.hora_inicio, p.hora_fin
         FROM pres_recurso pr, usuario u, prestamo p, recurso_recreativo rr
         WHERE pr.id_prestamo=p.id_prestamo AND p.id_usuario=u.id_usuario AND pr.id_recurso=rr.id_recurso 
         AND p.fecha_prestamo='".$fecha."'
         AND p.estatus_prestamo=0 ORDER BY fecha_prestamo, hora_inicio DESC";
            $this->connect();
            $result = $this->getData($query);
            $this->close();
            return $result;

    }
    function filtroPorMaterial($material){
        //Muestra los solicitudes (0 Solicitados, 1 Aceptados 2 Rechazados)
        $query="SELECT pr.id_prestamo_ma, u.nombre, u.primer_ap, u.segundo_ap,
         p.fecha_prestamo, p.hora_inicio, p.hora_fin
         FROM pres_recurso pr, usuario u, prestamo p, recurso_recreativo rr
         WHERE pr.id_prestamo=p.id_prestamo AND p.id_usuario=u.id_usuario AND pr.id_recurso=rr.id_recurso 
         AND rr.nombre_recurso='".$material."'
         AND p.estatus_prestamo=0 ORDER BY nombre_recurso, fecha_prestamo, hora_inicio DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;

    }
    function filtroPorMaterialYFecha($material,$fecha){
        //Muestra los solicitudes (0 Solicitados, 1 Aceptados 2 Rechazados)
        $query="SELECT pr.id_prestamo_ma, u.nombre, u.primer_ap, u.segundo_ap,
         p.fecha_prestamo, p.hora_inicio, p.hora_fin
         FROM pres_recurso pr, usuario u, prestamo p, recurso_recreativo rr
         WHERE pr.id_prestamo=p.id_prestamo AND p.id_usuario=u.id_usuario AND pr.id_recurso=rr.id_recurso 
         AND rr.nombre_recurso='".$material."' AND p.fecha_prestamo='".$fecha."'
         AND p.estatus_prestamo=0 ORDER BY nombre_recurso, fecha_prestamo, hora_inicio DESC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;

    }
}