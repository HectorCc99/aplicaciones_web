// activamos el escucha
$(document).ready(function () {
    //mandamos a llamar ambas funciones una vez cargada la pagina
    doc_pendientes();
    docs_revisados();
});

$(document).on("click",".ver_archivos",function () {
    //Accedo al tr y el tr tiene un atributo de id
    let element = $(this)[0].parentElement.parentElement;
    //console.log(element);
    let id=$(element).attr("id_persona");
    $("#id_usuario").html(`<input type="text" name="id_us" id="id_us" value="${id}" class="form-control">`)
    archivos_usuario(id);
    doc_pendientes();
    docs_revisados();
});

$(document).on("click",".aceptar_doc",function () {
    //Accedo al tr y el tr tiene un atributo de id
    let id_usuario=$("#id_us").val();
    let element =$(this)[0].parentElement.parentElement;
    let id_archivo=$(element).attr('id_archivo');
    let notas=document.getElementsByClassName(".notas")[1].attributes;
    console.log(id_archivo);
    console.log(id_usuario);
    console.log(notas);
    $.post(
        "./control/modifica_estatus_documentos.php",
        {id_usuario,id_archivo,notas},
        function (responsive){
            console.log(responsive);
            archivos_usuario(id_usuario);
            doc_pendientes();
            docs_revisados();
        }
    )
});
function archivos_usuario(id){
    $.ajax({
        // url que resive nuestros datos o peticion
        url:"./control/list_documentos.php",
        // dstos a mandar para la funcion
        data: {
            // filtro 1 pendientes, 2 revisados (incluye aceptados o rechazados)
            filtro: 3,
            id: id
        },
        // metodo por el que enviamos la informacion
        type: "POST",
        // end dado caso de ser satisfactorio el envio hacemos una funcion
        success: function (response){
            // guardamos en un objeto lo que imprima la pagina a la que enviamos informacion
            let obj_result=JSON.parse(response);
            //console.log(response);
            // creamos un contenedor
            let template="";
            var cont=0;
            // condicionamos si existen datos llenará la tabla, de lo contrario imprimira un mensaje
            if(obj_result.length>0){
                obj_result.forEach((obj_result=>{
                    cont++;
                //se asigna el valor a cada elemento
               template+=`<div class="form-group row" >
                            <input type="hidden" name="id_archivo" id="id_archivo${cont}" value="${obj_result.id_archivo}"  class="form-control">
                            
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label  class="col-form-label">${obj_result.tipo_archivo}:</label>
                            </div>
                            <div class="col-sm-5 mb-3 mb-sm-0" id="tira">
                                <a href="${obj_result.path_archivo}"><label for="tira_materias" class="col-form-label">${obj_result.nombre_archivo}</label></a>
                            </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="notas" class="col-form-label ml-1">Notas:</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <textarea name="notas" id="notas" cols="30" class="form-control notas" rows="3"></textarea>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons" id_archivo="${obj_result.id_archivo}" >
                                    <label class="btn btn-success">
                                        <input type="radio" name="options${cont}" class="btn aceptar_doc" value="1" >Aceptar
                                    </label>
                                    <label class="btn btn-danger">
                                        <input type="radio" name="options${cont}" class="btn rechazar_doc" value="2">Rechazar
                                    </label>
                                </div>
                            </div>
                        </div>`;

                }));
                $("#contenido_modal").html(template);
            }else{
                // vaciamos el contenedor de la tabla (DIV)
                $("#contenedor_tabla").empty();
                // creamos un contenedor con un mensaje para el usuario
                template=`<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>¡Felicidades!</strong> Ya no hay mas documentos por revisar, vuelva mas tarde.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                //se asigna al contenedor de la tabla
                $("#contenedor_tabla").html(template);
            }
        }
    });
}
//creamos una funcion para llenar la tabla de documentos pendientes
function doc_pendientes(){
    // llamamos a ajax
    $.ajax({
        // url que resive nuestros datos o peticion
        url:"./control/list_documentos.php",
        // dstos a mandar para la funcion
        data: {
            // filtro 1 pendientes, 2 revisados (incluye aceptados o rechazados)
            filtro: 1
        },
        // metodo por el que enviamos la informacion
        type: "POST",
        // end dado caso de ser satisfactorio el envio hacemos una funcion
        success: function (response){
            // guardamos en un objeto lo que imprima la pagina a la que enviamos informacion
            let obj_result=JSON.parse(response);
            // creamos un contenedor
            let template="";
            // condicionamos si existen datos llenará la tabla, de lo contrario imprimira un mensaje
            if(obj_result.length>0){
                // creamos un contador para la tabla
                var cont=0;
                // se hace una ciclo por cada elemento traido en la pagina de la url
                obj_result.forEach((obj_result=>{
                    // llenamos el contador
                    cont++;
                    // llenamos el contenido con informacion para la tabla
                    //SIEMPRE PONER EL ID DEL ELEMENTO TRAIDO DE LA BASE DE DATOS DENTRO DE SU TR CONTENEDOR
                    template+=`<tr id_persona="${obj_result.id_usuario}">
                                    <th scope="row">${cont}</th>
                                    <td>${obj_result.nombre+" "+obj_result.primer_ap+" "+obj_result.segundo_ap}</td>
                                    <td>${obj_result.cuenta}</td>
                                    <td>${obj_result.correo}</td>
                                    <td>${obj_result.carrera}</td>
                                    <td><button class="btn btn-primary ver_archivos" type="button" data-toggle="modal" data-target="#modalPendientes">Ver</button></td>
                                </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#tabla_pendientes").html(template);
            }else{
                // vaciamos el contenedor de la tabla (DIV)
                $("#contenedor_tabla").empty();
                // creamos un contenedor con un mensaje para el usuario
                template=`<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>¡Felicidades!</strong> Ya no hay mas documentos por revisar, vuelva mas tarde.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                //se asigna al contenedor de la tabla
                $("#contenedor_tabla").html(template);
            }
        }
    })
}

//creamos una funcion para la tabla de documentos revisados
function docs_revisados(){
    // llamamos a ajax
    $.ajax({
        // url que resive nuestros datos o peticion
        url:"./control/list_documentos.php",
        // dstos a mandar para la funcion
        data: {
            // filtro 1 pendientes, 2 revisados (incluye aceptados o rechazados)
            filtro: 2
        },
        // metodo por el que enviamos la informacion
        type: "POST",
        // end dado caso de ser satisfactorio el envio hacemos una funcion
        success: function (response){
            // guardamos en un objeto lo que imprima la pagina a la que enviamos informacion
            let obj_result=JSON.parse(response);
            //imprimimos para ver lo que estamos trayendo
            //console.log(response);
            // creamos un contenedor
            let template="";
            // condicionamos si existen datos llenará la tabla, de lo contrario imprimira un mensaje
            if(obj_result.length>0){
                // creamos un contador para la tabla
                var cont=0;
                // se hace una ciclo por cada elemento traido en la pagina de la url
                obj_result.forEach((obj_result=>{
                    // llenamos el contador
                    cont++;
                    // llenamos el contenido con informacion para la tabla
                    //SIEMPRE PONER EL ID DEL ELEMENTO TRAIDO DE LA BASE DE DATOS DENTRO DE SU TR CONTENEDOR
                    template+=`<tr id_persona="${obj_result.id_usuario}">
                                    <th scope="row">${cont}</th>
                                    <td>${obj_result.nombre+" "+obj_result.primer_ap+" "+obj_result.segundo_ap}</td>
                                    <td>${obj_result.cuenta}</td>
                                    <td>${obj_result.correo}</td>
                                    <td>${obj_result.carrera}</td>
                                    <td>${obj_result.fecha_aprobacion}</td>
                                    <td><button class="btn btn-primary ver_archivosA" type="button" data-toggle="modal" data-target="#modalRevisados">Ver</button></td>
                                </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#tabla_aceptados").html(template);
            }else{
                // vaciamos el contenedor de la tabla (DIV)
                $("#contenedor_tabla2").empty();
                // creamos un contenedor con un mensaje para el usuario
                template=`<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>¡Felicidades!</strong> no hay documentos  revisados, vuelva mas tarde.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                //se asigna al contenedor de la tabla
                $("#contenedor_tabla2").html(template);
            }
        }
    })
}
