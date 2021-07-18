

$(document).on("change",".list_actividad",function () {
    id= $("#deportes").val();
    //console.log($id);
    $("#grupos_1").empty();
    Listagrupos(id,1);
});


$(document).on("change",".grupo-1",function () {
    let iddeporte= $("#deportes").val();
    let id_grupo=$("#grupos_1").val();
    //console.log($id);
    $("#tabla_solicitudes").empty();
    TablaSolicitudes(iddeporte,id_grupo)

});

$(document).on("click",".aceptar_inscripcion",function (){
    let iddeporte= $("#deportes").val();
    let id_grupo=$("#grupos_1").val();
    //Accedo al tr y el tr tiene un atributo de id
    let element = $(this)[0].parentElement.parentElement.parentElement;
    //console.log(element);
    let id=$(element).attr("id_inscripcion");
    let estatus=1;
    //console.log(id);
    $.post(
        "./control/modifica_estatus_inscripcion.php",
        {id,estatus},
        function (responsive){
            //console.log(responsive);
            $("#tabla_solicitudes").empty();
            TablaSolicitudes(iddeporte,id_grupo);
        }
    )
});

$(document).on("click",".rechazar_inscripcion",function (){
    let iddeporte= $("#deportes").val();
    let id_grupo=$("#grupos_1").val();
    //Accedo al tr y el tr tiene un atributo de id
    let element = $(this)[0].parentElement.parentElement.parentElement;
    //console.log(element);
    let id=$(element).attr("id_inscripcion");
    let estatus=2;
    //console.log(id);
    $.post(
        "./control/modifica_estatus_inscripcion.php",
        {id,estatus},
        function (responsive){
            //console.log(responsive);
            $("#tabla_solicitudes").empty();
            TablaSolicitudes(iddeporte,id_grupo);
        }
    )
});

function TablaSolicitudes(iddeporte,id_grupo){
    $.ajax({
        url:"./control/list_solicitudes.php",
        data: {
            deporte: iddeporte,
            grupo:id_grupo
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);
            let template="";
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    cont++;
                    template+=`<tr id_inscripcion="${obj_result.id_inscripcion}">
                                    <th scope="row">${cont}</th>
                                    <td>${obj_result.nombre+" "+obj_result.primer_ap+" "+obj_result.segundo_ap}</td>
                                    <td>${obj_result.fecha_inscripcion}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button type="button" class="btn btn-success aceptar_inscripcion" >Aprobar</button>
                                            <button type="button" class="btn btn-danger rechazar_inscripcion">Rechazar</button>
                                        </div>
                                    </td>
                                </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#tabla_solicitudes").empty();
                $("#tabla_solicitudes").html(template);
            }
        }
    });
}

function Listagrupos(id,filtro){
    $.ajax({
        url:"./control/list_grupos.php",
        data: {
            filtro: 1,
            idGrupo: id
        },
        type: "POST",
        success: function (response){
            //console.log(response);
            let obj_result=JSON.parse(response);
            let template="<option selected disabled>seleccione...</option>";
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    cont++;
                    template+=`<option value="${obj_result.id_grupo}">${obj_result.grupo}</option>`;
                }));
                //se asigna al cuerpo de la tabla
                if(filtro==1){
                    $("#grupos_1").html(template);
                }else{
                    $("#grupos_2").html(template);
                }


            }else{
                if(filtro==1){
                    $("#grupos_1").html(`<option selected disabled> No hay grupos</option>`);
                }else{
                    $("#grupos_2").html(`<option selected disabled> No hay grupos</option>`);
                }


            }
        }
    });
}

$(document).on("change",".list_actividad2",function () {
    id= $("#deportes_edit").val();
    //console.log($id);
    $("#grupos_2").empty();
    Listagrupos(id,2);
});


$(document).on("change",".grupos_2",function () {

    let iddeporte= $("#deportes_edit").val();
    let id_grupo=$("#grupos_2").val();

    $("#tabla_inscripciones").empty();
    Tablainscripciones(iddeporte,id_grupo)

});

function Tablainscripciones(iddeporte,id_grupo){
    $.ajax({
        url:"./control/list_inscripciones.php",
        data: {
            deporte: iddeporte,
            grupo:id_grupo
        },
        type: "POST",
        success: function (response){
            
            let obj_result=JSON.parse(response);
            let template="";
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    cont++;
                    template+=`
                            <tr>
                                <th scope="row">${cont}</th>
                                <td>${obj_result.nombre+" "+obj_result.primer_ap+" "+obj_result.segundo_ap}</td>
                                <td>${obj_result.cuenta}</td>
                                <td>${obj_result.correo}</td>
                                <td>${obj_result.telefono}</td>
                                <td>${obj_result.carrera}</td>
                                <td>${obj_result.fecha_inscripcion}</td>
                            </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#tabla_inscripciones").empty();
                $("#tabla_inscripciones").html(template);
            }
        }
    });
}