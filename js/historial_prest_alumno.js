$(document).ready(function () {
    historiaPrestMaterial();
    historiaPrestArea();
});

function historiaPrestMaterial(){
    let id_usuario = $("#id_alumno").val();
    $.ajax({
        url:"./control/historial_prest_alumnos.php",
        data: {
            filtro: 1,
            id_usuario: id_usuario
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);
            //console.log(response);
            let template="";
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    console.log(response);
                    cont++;
                    if(obj_result.estatus_prestamo == 1){
                        estatus="Aceptado";
                    }
                    if(obj_result.estatus_prestamo == 2){
                        estatus="Rechazado";
                    }
                    if(obj_result.estatus_prestamo == 0){
                        estatus="Pendiente de Revisar";
                    }
                    template+=`<tr id_prestamo="${obj_result.id_prestamo}">
                                <th scope="row">${cont}</th>
                                <td>${obj_result.nombre_recurso}</td>
                                <td>${obj_result.fecha_prestamo}</td>
                                <td>${obj_result.hora_inicio}</td>
                                <td>${obj_result.hora_fin}</td>
                                <td>${estatus}</td>
                                <td>${obj_result.notas}</td>
                                </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#tablahistorialprestmat").html(template);
            }else{
                $("#contenedorhistorialprestmat").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Aun no tienes prestamos!</strong> Solicita uno.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#contenedorhistorialprestmat").html(template);
            }

            historiaPrestMaterial();
        }
    })
}


function historiaPrestArea(){
    let id_usuario = $("#id_alumno").val();
    $.ajax({
        url:"./control/historial_prest_alumnos.php",
        data: {
            filtro: 2,
            id_usuario: id_usuario
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);
            let template="";
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    console.log(response);
                    cont++;
                    if(obj_result.estatus_prestamo == 1){
                        estatus="Aceptado";
                    }
                    if(obj_result.estatus_prestamo == 2){
                        estatus="Rechazado";
                    }
                    if(obj_result.estatus_prestamo == 0){
                        estatus="Pendiente de Revisar";
                    }
                    template+=`<tr id_prestamo="${obj_result.id_prestamo}">
                                <th scope="row">${cont}</th>
                                <td>${obj_result.nombre_espacio}</td>
                                <td>${obj_result.fecha_prestamo}</td>
                                <td>${obj_result.hora_inicio}</td>
                                <td>${obj_result.hora_fin}</td>
                                <td>${estatus}</td>
                                <td>${obj_result.notas}</td>
                                </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#tablahistorialprestareas").html(template);
            }else{
                $("#contenedorhistorialprestarea").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Aun no tienes prestamos!</strong> Solicita uno.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#contenedorhistorialprestarea").html(template);
            }

            historiaPrestArea();
        }
    })
}