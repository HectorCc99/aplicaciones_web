// Activamos escucha

$(document).ready(function () {
    ListaHorarios(0);
    semestres();

});

// funcion eliminar Horario


$(document).on("click",".agregar_horario",function () {
        let grupo=$("#grupo").val();
        let deporte=$("#deportes").val();
        let prof=$("#profe").val();
        let telefono=$("#tel").val();
        let semestre=$("#sem").val();
        let cupo=$("#cupo").val();
        let lugar=$("#lugar").val();
        let lunes=$("#hora-inicio_l").val();
        let martes=$("#hora-inicio_m").val();
        let mier=$("#hora-inicio_mi").val();
        let jueves=$("#hora-inicio_j").val();
        let viernes=$("#hora-inicio_v").val();
        let lunes2=$("#hora-fin_l").val();
        let martes2=$("#hora-fin_m").val();
        let mier2=$("#hora-fin_mi").val();
        let jueves2=$("#hora-fin_j").val();
        let viernes2=$("#hora-fin_v").val();
    if(grupo != "" && deporte != "" && prof != "" && telefono != "" && semestre != ""
        && cupo != "" && lugar != ""){
        $.ajax({
            url:"./control/add_horario.php",
            data: {grupo, deporte,prof,telefono,semestre,cupo,lugar,lunes,martes,
                mier, jueves, viernes, lunes2, martes2, mier2, jueves2, viernes2
            },
            type: "POST",
            success: function (response){
              ListaHorarios(0);
            }
        });

    }else{
        alert("por favor llene los campos faltantes");
    }
});

function semestres(){
        var fecha = new Date();
        var ano1 = fecha.getFullYear();
        var ano = fecha.getFullYear();
        var mes =fecha.getMonth() + 1;

        let template2 = "";
        for ($i=0;$i<2;$i++){

                if(ano1 == ano){
                    if (mes<6){
                        msg=ano+'-1';
                        template2 += `<option value="${msg}" >${msg}</option>`;
                    }else{
                        msg=ano+'-2';
                        template2 += `<option value="${msg}" >${msg}</option>`;
                    }
                }else {
                    msg1 = ano + '-1';
                    msg2 = ano + '-2';
                    template2 += `<option value="${msg1}" >${msg1}</option>`;
                    template2 += `<option value="${msg2}" >${msg2}</option>`;
                }

            ano++
        }

        $("#sem").html(template2);
        $("#sem_edit").html(template2);
}
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
                    //console.log(response);
                    cont++;
                    template+=`<tr id_grupo="${obj_result.id_grupo}">
                                <th scope="row">${cont}</th>
                                <td>${obj_result.grupo}</td>
                                <td>${obj_result.nombre_actividad}</td>
                                <td>${obj_result.profesor}</td>
                                <td>${obj_result.telefono_prof}</td>
                                <td>${obj_result.semestre}</td>
                                <td>${obj_result.cupo}</td>
                                <td>${obj_result.nombre_espacio}</td>
                                <td>${obj_result.estatus_grupo==1? "Activo":"Inactivo"}</td>
                                <td>${obj_result.lunes!="-"? obj_result.lunes:"" }</td>
                                <td>${obj_result.martes!="-"? obj_result.martes:"" }</td>
                                <td>${obj_result.miercoles!="-"? obj_result.miercoles:"" }</td>
                                <td>${obj_result.jueves!="-"? obj_result.jueves:"" }</td>
                                <td>${obj_result.viernes!="-"? obj_result.viernes:"" }</td>
                                <td>
                                    <!--BOTON OPCIONES-->
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Opciones
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item editar_elemento" type="button" data-toggle="modal" data-target="#modalEditar">Editar</button>
                                            <button class="dropdown-item eliminar_horario" estatus="${obj_result.estatus_grupo}" type="button"> ${obj_result.estatus_grupo ==1? "Deshabilitar" : "Habilitar"}</button>
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