$(document).ready(function () {
    validarEstatus();
    historialInscripcionesAnteriores();
    inscripcionesActuales();
    tablaEstatusDocumentos();

});
function validarEstatus(){

    let id_usuario = $("#id_usuario").val();
    $.ajax({
        url:"./control/validacion_archivos.php",
        data: {
            id_alumno: id_usuario,
            filtro:2
        },
        type: "POST",
        success: function (response) {
            let obj_result=JSON.parse(response);
            var count="";
            if (obj_result.length > 0) {
                obj_result.forEach((obj_result => {
                    count++;
                    if (count < 4) {
                        document.getElementById("alertMensajeInicio").style.display = 'block';
                    } else if ( count ==4) {
                        document.getElementById("alertMensajeInicio").style.display = 'none';
                    }
                }))
            }else{
                document.getElementById("alertMensajeInicio").style.display = 'block';
            }

        }
    })
}

function historialInscripcionesAnteriores(){
    let id_usuario = $("#id_usuario").val();
    $.ajax({
        url:"./control/list_inscripciones_alumnos.php",
        data: {
            filtro: 1,
            id_usuario: id_usuario
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);
            let template="";
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    //console.log(response);
                    cont++;
                    template+=`<tr>
                                <th scope="row">${cont}</th>
                                <td>${obj_result.nombre_actividad}</td>
                                <td>${obj_result.nombre}</td>
                                <td>${obj_result.grupo}</td>
                                <td>${obj_result.semestre}</td>
                                </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#tablahistorialinscripciones").html(template);
            }else{
                $("#contenedorhistorial").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Aun no se genera un historial!</strong> Inscribe un deporte.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#contenedorhistorial").html(template);
            }
        }
    })
}

function inscripcionesActuales(){
    let id_usuario = $("#id_usuario").val();
    $.ajax({
        url:"./control/list_inscripciones_alumnos.php",
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
                    //console.log(response);
                    cont++;
                        template+=` <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-1 wow fadeInUp" data-wow-delay="0.0s" id="tarjetainscripcionesA">
                                    <div class="class-wrap" >
                                   <div class="class-img">
                                        <img src="${obj_result.img_deporte}" alt="" width="60px">
                                   </div>
                                   <div class="class-text" >
                                       <div class="class-teacher">
                                            <img src="iconos/teacher.svg" alt="Image">
                                            <h3>${obj_result.profesor}</h3>
                                       </div>
                                       <h2>${obj_result.nombre_actividad}</h2>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Categoría: </span>${obj_result.nombre}</p>
                                       </div>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Descripción: </span>${obj_result.descripcion}</p>
                                       </div>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Horarios: </p>
                                       </div>
                                       <div class="class-meta">
                                            <p>${obj_result.lunes!="-"? "Lun: "+obj_result.lunes+"</p>":""}
                                            <p>${obj_result.martes!="-"? "Mar: "+obj_result.martes+"</p>":""}
                                       </div>
                                       <div class="class-meta">
                                            <p>${obj_result.miercoles!="-"? "Mié: "+obj_result.miercoles+"</p>":""}
                                            <p>${obj_result.jueves!="-"? "Jue: "+obj_result.jueves+"</p>":""}
                                       </div>
                                       <div class="class-meta">
                                            <P>${obj_result.viernes!="-"? "Vie: "+obj_result.viernes+"</P>":""}
                                       </div>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Ubicación: </span>${obj_result.nombre_espacio}</p>
                                       </div>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Semestre: </span>${obj_result.semestre}</p>
                                       </div>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Grupo: </span>${obj_result.grupo}</p>
                                       </div>
                                   </div>
                                   </div>
                                   </div>
                               `;
                }));
                //se asigna al cuerpo de la tabla
                $("#contenedorInscripActuales").html(template);
            }else{
                $("#contenedorInscripActuales").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Aun no esta registrado en un deporte actualmente</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#contenedorInscripActuales").html(template);
            }
        }
    })
}

function tablaEstatusDocumentos(){
    let id_usuario = $("#id_usuario").val();
    $.ajax({
        url:"./control/list_inscripciones_alumnos.php",
        data: {
            filtro: 3,
            id_usuario: id_usuario
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);
            let template="";
            let estatus="";
            let suma=0;
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    //console.log(response);
                    cont++;
                    if(obj_result.estatus_aprobado == 1){
                        estatus="Aceptado";
                        suma=suma+1;
                    }
                    if(obj_result.estatus_aprobado == 2){
                        estatus="Rechazado";
                        suma=suma+0;
                    }
                    if(obj_result.estatus_aprobado == 0){
                        estatus="Pendiente de Revisar";
                        suma=suma+0;
                    }

                    template+=`<tr>
                                <th scope="row">${cont}</th>
                                <td>${obj_result.nombre_archivo}</td>
                                <td>${estatus}</td>
                                <td>${obj_result.notas}</td>
                                </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                if(suma==4){
                    $("#mensaje_docs").empty();
                    template=`<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>¡En hora buena!</strong> Todos tus documentos fueron aceptados.</p>
                                Acude a las oficinas para recoger tu credencial deportiva.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                    $("#mensaje_docs").html(template);
                }else{
                    $("#tablaestadodocumentos").html(template);
                }

            }else{
                $("#contenedorestdoc").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Aun no subes tus documentos!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#contenedorestdoc").html(template);
            }
        }
    })
}