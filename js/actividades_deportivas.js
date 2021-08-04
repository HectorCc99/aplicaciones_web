// Activamos escucha

$(document).ready(function () {
    if(tabla){
        TablaActividades();
        lista_tipo_Act();
    }else{
        if(deportes){
            deportesalumno(0);
            List_tipo_deportes();
            $(document).on("click",".filter",function(){
                let element= $(this)[0];
                let filtro=$(element).attr("id");
                deportesalumno(filtro);
            });
        }else{
            deportesindex(0);
            List_tipo_deportes();
            $(document).on("click",".filter",function(){
                let element= $(this)[0];
                let filtro=$(element).attr("id");
                deportesindex(filtro);
            });
        }
        if (cd){
            listaActividades();
        }

    }

});

$(document).on("click",".inscribir",function(){
    let element= $(this)[0];
    let id_grupo=$(element).attr("id_grupo");
    let semestre=$(element).attr("semestre");
    $("#id_grupo_select").val(id_grupo);
    $("#semestre").val(semestre);

});

$(document).on("click",".solicitar",function(){
    let id_grupo= $("#id_grupo_select").val();
    let id_usuario= $("#id_usuario").val();
    let semestre=$("#semestre").val();
    console.log(semestre);
    $.post(
        "./control/inscribe_grupo.php",
        {id_usuario,id_grupo,semestre},
        function (responsive){
            alert("Inscripcion solicitada");
            deportesalumno(0);
        }
    )
});



function deportesindex(tipo){
    $.ajax({
        url:"./control/list_actividades2.php",
        data: {
            tipo: tipo
        },
        type: "POST",
        success: function (response){
            console.log(response);
            let obj_result=JSON.parse(response);
            let template="";
            if(obj_result.length>0){
                var cont=0;
                var secunds=0.0;
                obj_result.forEach((obj_result=>{
                    cont++;
                    template+=`<div class="col-lg-4 col-md-6 col-sm-12 class-item filter-${obj_result.id_tipo} wow fadeInUp" data-wow-delay="${secunds}s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="${obj_result.img}" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="iconos/teacher.svg" alt="Image">
                                    <h3>${obj_result.profesor}</h3>
                                    <a href="login.php">+</a>
                                </div>
                                <h2>${obj_result.nombre_actividad}</h2>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Categoría: </span>${obj_result.nombre}</p>
                                </div>
                                <div class="class-meta">
                                    <span class="font-weight-bold"><p>Descripcion:</p> </span>
                                </div>    
                                <div class="class-meta">
                                    <p> ${obj_result.descripcion}</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Horario: </p>
                                </div>
                                <div class="class-meta">
                                    <p class="font-weight-normal">${obj_result.lunes!="-"? "Lun: "+obj_result.lunes+"</p>":""}
                                    <p class="font-weight-normal">${obj_result.martes!="-"? "Mar: "+obj_result.martes+"</p>":""}
                                    <p class="font-weight-normal">${obj_result.miercoles!="-"? "Mié: "+obj_result.miercoles+"</p>":""}
                                    <p class="font-weight-normal">${obj_result.jueves!="-"? "Jue: "+obj_result.jueves+"</p>":""}
                                    <p class="font-weight-normal">${obj_result.viernes!="-"? "Vie: "+obj_result.viernes+"</p>":""}
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Ubicación: </span>${obj_result.nombre_espacio}</p>
                                </div>
                                <div class="class-meta">
                                    <p> ${obj_result.ubicacion}</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Grupo: </span>${obj_result.grupo}</p>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    secunds=secunds+0.2;
                }));
                //se asigna al cuerpo de la tabla
                $("#Deportes").html(template);
            }else{
                $("#Deportes").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" style="width: 100%" role="alert">
                                <br>
                                <p><strong>Lo sentimos</strong> No hay actividades deportivas para esta categoria.</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#Deportes").html(template);
            }
        }

    });
}

function List_tipo_deportes(){
    $.ajax(
        {
            url: "./control/list_tipos_act.php",
            success: function (response)
            {
                let obj_result = JSON.parse(response);
                let template =`<li data-filter="*" class="filter" id="0">Todos los deportes</li>`;
                obj_result.forEach(
                    (obj_result)=>
                    {
                        template += `<li data-filter=".filter-${obj_result.id_tipo}" class="filter" id="${obj_result.id_tipo}" >${obj_result.nombre}</li>`;
                    }
                );
                $("#class-filter").html(template);
            }
        }
    );
}


function deportesalumno(tipo){
    $.ajax({
        url:"./control/list_actividades2.php",
        data: {
            tipo: tipo
        },
        type: "POST",
        success: function (response){
            console.log(response);
            let obj_result=JSON.parse(response);
            let template="";
            if(obj_result.length>0){
                var cont=0;
                var secunds=0.0;
                obj_result.forEach((obj_result=>{
                    cont++;
                    template+=`<div class="col-lg-4 col-md-6 col-sm-12 class-item filter-${obj_result.id_tipo} wow fadeInUp" data-wow-delay="${secunds}s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="${obj_result.img}" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="iconos/teacher.svg" alt="Image">
                                    <h3>${obj_result.profesor}</h3>
                                    <a href="#" data-toggle="modal" class="inscribir" id_grupo="${obj_result.id_grupo}"  semestre="${obj_result.semestre}"data-target="#modalSolicitud">+</a>
                                </div>
                                <h2>${obj_result.nombre_actividad}</h2>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Categoría: </span>${obj_result.nombre}</p>
                                </div>
                                <div class="class-meta">
                                    <span class="font-weight-bold"><p>Descripcion:</p> </span>
                                </div>    
                                    <div class="class-meta">
                                    <p>${obj_result.descripcion}</p>
                                    </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Horario: </p>
                                    <p class="font-weight-normal">${obj_result.lunes!="-"? "Lun: "+obj_result.lunes+"</p>":""}
                                    <p class="font-weight-normal">${obj_result.martes!="-"? "Mar: "+obj_result.martes+"</p>":""}
                                    <p class="font-weight-normal">${obj_result.miercoles!="-"? "Mié: "+obj_result.miercoles+"</p>":""}
                                    <p class="font-weight-normal">${obj_result.jueves!="-"? "Jue: "+obj_result.jueves+"</p>":""}
                                    <p class="font-weight-normal">${obj_result.viernes!="-"? "Vie: "+obj_result.viernes+"</p>":""}
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Ubicación: </span>${obj_result.nombre_espacio}</p>
                                </div>
                                <div class="class-meta">
                                    <p> ${obj_result.ubicacion}</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Grupo: </span>${obj_result.grupo}</p>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    secunds=secunds+0.2;
                }));
                //se asigna al cuerpo de la tabla
                $("#Deportes").html(template);
            }else{
                $("#Deportes").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" style="width: 100%" role="alert">
                                <br>
                                <p><strong>Lo sentimos</strong> No hay actividades deportivas para esta categoria.</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#Deportes").html(template);
            }
        }

    });
}
function listaActividades(){
    $.ajax({
        url:"./control/list_deptos.php",
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
            //console.log(responsive);
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
                $("#tipos2").html(template);

            }
        }
    );
}