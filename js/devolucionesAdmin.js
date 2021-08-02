$(document).ready(function (){
   tablaDevoluciones()
});
function tablaDevoluciones(){
    $.ajax(
        {
            url:"./control/devolucionesMateriales.php",
            data:{
                tipoBusqueda: 1
            },
            type: "POST",
            success: function (response) {
                let obj_result=JSON.parse(response);
                let template="";
                if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result =>{
                    cont++;
                    template += `<tr id_presMat="${obj_result.id_prestamo}">
                        <th scope="row">${cont}</th>
                        <td>${obj_result.nombre+" "+obj_result.primer_ap+" "+obj_result.segundo_ap}</td>
                        <td>${obj_result.fecha_prestamo}</td>
                        <td>${obj_result.nombre_recurso}</td>
                        <td>${obj_result.hora_inicio}</td>
                        <td>${obj_result.hora_fin}</td>
                        <td>${obj_result.estatus_prestamo == 3 ? "Devuelto optimamente" :
                        obj_result.estatus_prestamo == 4 ? "Credencial retenida" : 
                            obj_result.estatus_prestamo == 5 ? "Material repuesto" 
                            :obj_result.estatus_prestamo == 1 ? "" : obj_result.estatus_prestamo}</td>
                        <td>${obj_result.notas == null ? " " : obj_result.notas}</td>
                       
                        <td>
                            <button type="button" class="btn btn-primary editar_devolucionBtn" id="editar_devolucionBtn" data-toggle="modal"
                                    data-target="#modalEditarDevolucion">Editar
                            </button>
                        </td>
                       
                    </tr>`
                }));
                //se asigna al cuerpo de la tabla
                $("#tbl-devoluciones").html(template);
                }else{
                    $("#contenedor-devoluciones").empty();
                    template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Lo sentimos</strong> No hay devoluciones, vuelva mas tarde.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                    $("#contenedor-devoluciones").html(template);
                }
            }
        }
    )
}
//Guardar el Id dentro del modal
$(document).on("click",".editar_devolucionBtn",function () {
    let element = $(this)[0].parentElement.parentElement;
    let id_prestamo=$(element).attr("id_presmat");

    consultaPrestamoDevolucion(id_prestamo);

});
function consultaPrestamoDevolucion(id_prestamo){
    $.ajax({
        url:"./control/devolucionesMateriales.php",
        data: {
            // 0 trae todos, 1 trae activos, 2 trae inactivos
            id_prestamoV: id_prestamo,
            tipoBusqueda: 2
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);

            obj_result.forEach((obj_result=>{
                $("#id_devolucion").val(obj_result.id_prestamo);
                $("#materialEditarDevolucion").val(obj_result.nombre_recurso);
                $("#alumnoEditarDevolucion").val(obj_result.nombre+" "+obj_result.primer_ap+" "+obj_result.segundo_ap);
                $("#fechaEditarDevolucion").val(obj_result.fecha_prestamo);
                $("#hora_inicioEditarDevolucion").val(obj_result.hora_inicio);
                $("#hora_terminoEditarDevolucion").val(obj_result.hora_fin);
                $("#notasEditarDevolucion").val(obj_result.notas);


            }));
        }
    })
}


$(document).on("click",".guardar-EdicionDevolucion",function () {
    let id_prestamo=$("#id_devolucion").val();
    let notas=$("#notasEditarDevolucion").val();
    let estatus=$("#estatusEditarDevolucion").val();

    $.ajax({
        url:"./control/devolucionesMateriales.php",
        data: {
            // 0 trae todos, 1 trae activos, 2 trae inactivos
            id_prestamoV: id_prestamo,
            tipoBusqueda: 3,
            notas: notas,
            estatus:estatus
        },
        type: "POST",
        success: function (response){
            alert("Se actualizó la devolución correctamente.");
           tablaDevoluciones();
        }
    })
});
