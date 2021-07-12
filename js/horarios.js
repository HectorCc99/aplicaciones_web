// Activamos escucha

$(document).ready(function () {
    ListaHorarios(0);

});

function ListaHorarios(filtro){
    $.ajax({
        url:"./control/list_horarios.php",
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
                    cont++;
                    template+=`<tr id_grupo="${obj_result.id_grupo}">
                                <th scope="row">${cont}</th>
                                <td>${obj_result.grupo}</td>
                                <td>${obj_result.nombre_actividad}</td>
                                <td>${obj_result.profesor}</td>
                                <td>${obj_result.telefono_prof}</td>
                                <td>${obj_result.semestre}</td>
                                <td>${obj_result.cupo}</td>
                                <td>${obj_result.lugar}</td>
                                <td>${obj_result.estatus_grupo}</td>
                                <td>${obj_result.lunes!=null? obj_result.lunes:"" }</td>
                                <td>${obj_result.martes!=null? obj_result.martes:"" }</td>
                                <td>${obj_result.miercoles!=null? obj_result.miercoles:"" }</td>
                                <td>${obj_result.jueves!=null? obj_result.jueves:"" }</td>
                                <td>${obj_result.viernes!=null? obj_result.viernes:"" }</td>
                                <td>
                                    <!--BOTON OPCIONES-->
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Opciones
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#modalEditar">Editar</button>
                                            <button class="dropdown-item" type="button">Eliminar</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#contenido_tabla").html(template);
            }else{
                $("#contenedor_actividades").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert"  style="  width: 100%;">
                                <strong>Lo sentimos</strong> No hay horarios registrados.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#contenedor_actividades").html(template);
            }
        }
        })
}