// Activamos escucha

$(document).ready(function () {
    TablaEventos(0);
    lista_desplegable_material();
    /*if(tablaEv){
        TablaEventos(0);
    }else{
        lista_desplegable_material();
    }*/
});



function TablaEventos(filtro) {
    $.ajax({
        url:"./control/listar_eventos.php",
        data: {
            // 0 trae todos, 1 trae activos, 2 trae inactivos
            filtro: filtro
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
                    template+=`<tr id_evento="${obj_result.id_evento}">
                                <th scope="row">${cont}</th>
                                <td>${obj_result.nombre_actividad}</td>
                                <td>${obj_result.encargado}</td>
                                <td>${obj_result.telefono_encargado}</td>
                                <td>${obj_result.nombre_espacio}</td>
                                <td>${obj_result.nombre_recurso}</td>
                                <td>${obj_result.cantidad_recurso}</td>
                                <td>${obj_result.semestre}</td>
                                <td>${obj_result.fecha_inicio} - ${obj_result.fecha_fin}</td>
                                <td>${obj_result.hora_inicio} - ${obj_result.hora_fin}</td>
                                <td>${obj_result.estatus_evento == 1 ? "Activo":"Inactivo" }</td>
                                <td>
                                    <!--BOTON OPCIONES-->
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Opciones
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item editar_evento" type="button" data-toggle="modal" data-target="#modalEditar">Editar</button>
                                            <button class="dropdown-item estado_evento" estatusEv="${obj_result.estatus_evento}" type="button">${obj_result.estatus_evento ==1? "Deshabilitar" : "Habilitar"}</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#contenido_tbleventos").html(template);
            }else{
                $("#contenedor_eventos").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Lo sentimos</strong> No hay eventos activos, active uno o cree uno por favor.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#contenedor_eventos").html(template);
            }
        }
    })
}

$(document).on("click",".estado_evento",function () {
    //Accedo al tr y el tr tiene un atributo de id
    let element = $(this)[0].parentElement.parentElement.parentElement.parentElement;
    let estatus = $(this)[0];
    let estatus_cambio;
    //console.log(element);
    let id=$(element).attr("id_evento");
    let estatus_ev = $(estatus).attr("estatusEv");
    //console.log(id);
    //console.log(estatus_ev);
    estatus_ev==1? estatus_cambio =0 :estatus_cambio=1 ;
    $.post(
        "./control/modifica_estatus_evento.php",
        {id,estatus_cambio},
        function (responsive){
            //console.log(responsive);
            TablaEventos(0);
        }
    )
});

function lista_desplegable_material(){
    $.ajax({
        url:"./control/list_rec_recreativo.php",
        success: function (response){
            let obj_result=JSON.parse(response);
            let template=`<option disabled selected>Seleccione...</option>`;
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    cont++;
                    template+=`<option value="${obj_result.id_recurso}">${obj_result.nombre_recurso}</option>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#materialEv").html(template);
                $("#materialEv2").html(template);
                $("#materialEv3").html(template);
                $("#materialEvEd").html(template);
                $("#materialEvEd2").html(template);
                $("#materialEvEd3").html(template);

            }else{
                $("#lista_desplegable_material").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Lo sentimos</strong> No hay materiales disponibles, por favor registré uno.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#lista_desplegable_material").html(template);
            }
        }
    })
}


// acción al modificar un evento (esta función solo guarda el id dentro del modal)
$(document).on("click",".editar_evento",function () {
    //Accedo al tr y el tr tiene un atributo de id
    let element = $(this)[0].parentElement.parentElement.parentElement.parentElement;
    //console.log(element);
    let id=$(element).attr("id_evento");
    //console.log(id);
    consulta_evento(id);
});

//función de consulta de editar un evento
function consulta_evento(id){
    $.ajax({
        url:"./control/list_eventos2.php",
        data: {
            // 0 trae todos, 1 trae activos, 2 trae inactivos
            filtro: 1,
            idEvento: id
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);
            //console.log(response);
            obj_result.forEach((obj_result=>{
                $("#evento_id_edit").val(id);
                $("#eventoEd").val(obj_result.nombre_actividad);
                $("#encargadoEd").val(obj_result.encargado);
                $("#telefonoEvEd").val(obj_result.telefono_encargado);
                $("#semEvEd").val(obj_result.semestre);
                $("#lugarEvEd").val(obj_result.id_espacio_r);
                $("#materialEvEd").val(obj_result.id_recurso);
                $("#cantidadEvEd").val(obj_result.cantidad_recurso);
                $("#descripcionEvEd").val(obj_result.descripcion);
                $("#fecha_inicioEd").val(obj_result.fecha_inicio);
                $("#fecha_cierreEd").val(obj_result.fecha_fin);
                $("#hora_inicioEd").val(obj_result.hora_inicio);
                $("#hora_cierreEd").val(obj_result.hora_fin);
            }));
        }
    })
}

/*
$(document).on("click",".guardar_datos_editar",function (){
    let id = $("#evento_id_edit").val();
    let evento = $("#eventoEd").val();
    let encargado =  $("#encargadoEd").val();
    let tel = $("#telefonoEvEd").val();
    let semestre =  $("#semEvEd").val();
    let espacio = $("#lugarEvEd").val();
    let recurso = $("#materialEvEd").val();
    let cant = $("#cantidadEvEd").val();
    let descrip = $("#descripcionEvEd").val();
    let fechai =  $("#fecha_inicioEd").val();
    let fechaf = $("#fecha_cierreEd").val();
    let horai = $("#hora_inicioEd").val();
    let horac = $("#hora_cierreEd").val();
    let imagen = $("#posterEd").val();
    let filtro = 2;
    $.post(
        "./control/list_eventos2.php",
        {filtro,id,evento,encargado,tel,semestre,espacio, recurso,
            cant, descrip,fechai,fechaf, horai,horac,imagen},
        function (responsive){
            //console.log(responsive);
            TablaEventos(0);
        }
    )
});
*/