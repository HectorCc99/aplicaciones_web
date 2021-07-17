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
                                            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#modalEditar">Editar</button>
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
                $("#materialEvEd").html(template);
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