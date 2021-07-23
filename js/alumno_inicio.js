$(document).ready(function () {
    historialInscripcionesAnteriores();
    inscripcionesActuales();
    tablaEstatusDocumentos();
});

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
                        template+=`<div class="class-wrap" >
                                   <div class="class-img">
                                        <img src="./icons/sports.svg" alt="" width="60px">
                                   </div>
                                   <div class="class-text" >
                                       <div class="class-teacher">
                                            <img src="icons/teacher.svg" alt="Image">
                                            <h3>${obj_result.profesor}</h3>
                                       </div>
                                       <h2>${obj_result.nombre_actividad}</h2>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Categoría: </span>${obj_result.nombre}</p>
                                       </div>
                                       <span class="font-weight-bold">-----------------------------------</span>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Lunes: </span>${obj_result.lunes!="-"? obj_result.lunes:"" }</p>
                                       </div>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Martes: </span>${obj_result.martes!="-"? obj_result.martes:"" }</p>
                                       </div>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Miércoles: </span>${obj_result.miercoles!="-"? obj_result.miercoles:"" }</p>
                                       </div>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Jueves: </span>${obj_result.jueves!="-"? obj_result.jueves:"" }</p>
                                       </div>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Viernes: </span>${obj_result.viernes!="-"? obj_result.viernes:"" }</p>
                                       </div>
                                       <span class="font-weight-bold">-----------------------------------</span>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Ubicación: </span>${obj_result.nombre_espacio}</p>
                                       </div>
                                       <span class="font-weight-bold">-----------------------------------</span>
                                       <div class="class-meta">
                                            <p><span class="font-weight-bold">Grupo: </span>${obj_result.grupo}</p>
                                       </div>
                                   </div>
                                   </div>
                               `;
                }));
                //se asigna al cuerpo de la tabla
                $("#tarjetainscripcionesA").html(template);
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
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    //console.log(response);
                    cont++;
                    template+=`<tr>
                                <th scope="row">${cont}</th>
                                <td>${obj_result.nombre_archivo}</td>
                                <td>${obj_result.estatus_aprobado == 1 ? "Aceptado":"Rechazado"}</td>
                                <td>${obj_result.notas}</td>
                                </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#tablaestadodocumentos").html(template);
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