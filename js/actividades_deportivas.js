// Activamos escucha

$(document).ready(function () {
    if(tabla){
        TablaActividades();
    }else{
        listaActividades();
    }
});

function listaActividades(){
    $.ajax({
        url:"./control/list_actividades.php",
        data: {
            filtro: 1
        },
        type: "POST",
        success: function (response){
            //console.log(response);
            let obj_result=JSON.parse(response);
            let template="<option value='0' disabled selected>seleccione...</option>";
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    cont++;
                    template+=`<option value="${obj_result.id_actividad}">${obj_result.nombre_actividad}</option>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#deportes").html(template);
                $("#deportes_edit").html(template);
            }else{
                $("#lista_desplegable").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Lo sentimos</strong> No hay actividades deportivas activas, por favor active una.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#lista_desplegable").html(template);
            }
        }
    });
}


//
function TablaActividades() {
    $.ajax({
        url:"./control/list_actividades.php",
        data: {
            filtro: 0
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);
            let template="";
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    cont++;
                    template+=`<tr id_actividad="${obj_result.id_actividad}">
                                <th scope="row">${cont}</th>
                                <td>${obj_result.nombre_actividad}</td>
                                <td>${obj_result.descripcion}</td>
                                <td>${obj_result.nombre}</td>
                                <td>${obj_result.fecha_creacion}</td>
                                <td>${obj_result.estatus_actividad == 1 ? "Activo":"Inactivo" }</td>
                                <td>
                                    <!--BOTON OPCIONES-->
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Opciones
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item editar_actividad" type="button" data-toggle="modal" data-target="#modalEditar">Editar</button>
                                            <button class="dropdown-item eliminar_actividad" value="${obj_result.estatus_actividad}" type="button">${obj_result.estatus_actividad == 1 ? "Deshabilitar":"Habilitar" }</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#tbl-actividades").html(template);
            }else{
                $("#contenedor_actividades").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Lo sentimos</strong> No hay actividades deportivas activas, vuelva mas tarde.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#contenedor_actividades").html(template);
            }
        }
    })
}

//escucha que se acciona al dar clic al boton
$(document).on("click",".editar_actividad",function () {
    //Accedo al tr y el tr tiene un atributo de id
    let element = $(this)[0].parentElement.parentElement.parentElement.parentElement;
   //console.log(element);
    let id=$(element).attr("id_actividad");
    $("#contenedor_act").html(`<input type="hidden" name="id_actividad" id="id_act" value="${id}" class="form-control">`);
    detalles_actividad(id);
    TablaActividades();
     lista_tipo_Act();
});


$(document).on("click",".eliminar_actividad",function () {
    //Accedo al tr y el tr tiene un atributo de id
        let element = $(this)[0].parentElement.parentElement.parentElement.parentElement;
        let estatus_element =$(this)[0];
        let estatus_c=0;
        //console.log(element);
        let id = $(element).attr("id_actividad");
        let estatus=$(estatus_element).attr("value");
        estatus==1? estatus_c=0 : estatus_c=1;
        $.post(
            "./control/modifica_estatus_act.php",
            {id,estatus_c},
            function (responsive){
                //console.log(responsive);
                lista_tipo_Act();
                TablaActividades();
            }
        )
});

$(document).on("click",".editar-datos",function () {
    let id = $("#id_act").attr("value");
    let nombre = $("#nombre_c").val();
    let descripcion = $("#desc_c").val();
    let tipo=$("#tipos").val();
    $.post(
        "./control/modifica_actividad.php",
        {id,nombre,descripcion,tipo},
        function (responsive){
            console.log(responsive);
            TablaActividades();
        }
    )
})


function detalles_actividad($id_actividad){
    $.ajax({
        url:"./control/detalles_actividad.php",
        data: {
            idAc: $id_actividad
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);
                var cont=0;
                obj_result.forEach((obj_result=>{
                    cont++;
                $("#nombre_ac_m").html(`<input type="text" name="nombre" id="nombre_c" value="${obj_result.nombre_actividad}" class="form-control">`);
                $("#descr_m").html(`<textarea class="form-control" name="desc" id="desc_c"  rows="3">${obj_result.descripcion}</textarea>`);
                //$("#estatus_m").html(`<input type="text" name="status" id="status" value="${obj_result.estatus_actividad == 1 ? "Activo":"Inactivo" }" class="form-control">`);
                }));
            TablaActividades();
        }
    })
}
function lista_tipo_Act(){
    $.ajax(
        {
            url: "./control/list_tipos_act.php",
            success: function (response)
            {
                let obj_result = JSON.parse(response);
                let template = " <option selected disabled>selecione una categoria</option> ";
                obj_result.forEach(
                    (obj_result)=>
                    {
                        template += `<option value="${obj_result.id_tipo}">${obj_result.nombre}</option>`;
                    }
                );
                $("#tipos").html(template);
            }
        }
    );
}