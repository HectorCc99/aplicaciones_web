// activamos escucha
$(document).ready(function () {
        lista_desplegable();
});

$(document).on("change",".area",function () {
    let idespacio= $("#area").val();
    //console.log(idespacio);
    $("#contenido_tabla").empty();
    tablaespacios(idespacio)

});

function tablaespacios(idespacio){

    $.ajax({
        url:"./control/list_prestamos_espacios.php",
        data: {
            id: idespacio
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);
            //console.log(response);
            let template=` <table class="table table-hover table-striped table-sm mt-3">
                        <thead>
                        <th scope="col">#</th>
                        <th scope="col">Nombre del Alumno</th>
                        <th scope="col">Espacio</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora de Inicio</th>
                        <th scope="col">Hora de Término</th>
                        <th scope="col">Estatus</th>
                        </thead>
                        <tbody>`;
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    cont++;

                        <!--AJAX-->

                    template+=`<tr id_prestamo="${obj_result.id_prestamo}">
                                    <th scope="row">${cont}</th>
                                    <td>${obj_result.nombre+" "+obj_result.primer_ap+" "+obj_result.segundo_ap}</td>
                                    <td>${obj_result.nombre_espacio}</td>
                                    <td>${obj_result.fecha_prestamo}</td>
                                    <td>${obj_result.hora_inicio}</td>
                                    <td>${obj_result.hora_fin}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button type="button" class="btn btn-success aceptar_p">Aceptar</button>
                                            <button type="button" class="btn btn-danger rechazar_p">Rechazar</button>
                                        </div>
                                    </td>
                                </tr>`;
                }));
                    template+=`</tbody>
                            </table>`;
                //se asigna al cuerpo de la tabla
                $("#tabla").html(template);
            }else{
                $("#tabla").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Lo sentimos</strong> No hay mas solicitudes para reservar esta area deportiva, por favor vuelva mas tarde.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#tabla").html(template);
            }
        }
    });
}

$(document).on("click",".aceptar_p",function () {
    // optengo el id del area seleccionada
    let id_list=$("#area").val();
    // obtengo el elemento que contiene el id de mi prestamo a rechazar
    let element=$(this)[0].parentElement.parentElement.parentElement;
    // extraigo el id del elemento que contiene le prestamo
    let id = $(element).attr("id_prestamo");
    // le mando el estatus al que le quiero cambiar el estatus
    let estatus=1;
    // lo envio por metodo post a la pagina que va a enviar mi peticion
    $.post(
        // url de la pagina
        "./control/modifica_prestamo_esp.php",
        // datos a enviar
        {id,estatus},
        // funcion que realiza si es exitoso mi envio
        function (responsive){
            // compruebo lo que me regresa la funcion
            //console.log(responsive);
            // recargo la tabla con el id del area seleccionada previamente
            tablaespacios(id_list);
        }
    )
})

$(document).on("click",".rechazar_p",function () {
    // optengo el id del area seleccionada
    let id_list=$("#area").val();
    // obtengo el elemento que contiene el id de mi prestamo a rechazar
    let element=$(this)[0].parentElement.parentElement.parentElement;
    // extraigo el id del elemento que contiene le prestamo
    let id = $(element).attr("id_prestamo");
    // le mando el estatus al que le quiero cambiar el estatus
    let estatus=2;
    // lo envio por metodo post a la pagina que va a enviar mi peticion
    $.post(
        // url de la pagina
        "./control/modifica_prestamo_esp.php",
        // datos a enviar
        {id,estatus},
        // funcion que realiza si es exitoso mi envio
        function (responsive){
            // compruebo lo que me regresa la funcion
            //console.log(responsive);
            // recargo la tabla con el id del area seleccionada previamente
            tablaespacios(id_list);
        }
    )
})

function lista_desplegable(){
    $.ajax({
        url:"./control/list_espacios.php",
        success: function (response){
            let obj_result=JSON.parse(response);
            let template=`<option disabled selected>Seleccione...</option>`;
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    cont++;
                    template+=`<option value="${obj_result.id_espacio}">${obj_result.nombre_espacio}</option>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#area").html(template);
                $("#lugarEv").html(template);
                $("#lugarEvEd").html(template);
            }else{
                $("#lista_desplegable").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Lo sentimos</strong> No hay espacios recreativos disponibles, por favor registré uno.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#lista_desplegable").html(template);


            }
        }
    })
}