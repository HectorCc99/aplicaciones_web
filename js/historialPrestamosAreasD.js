$(document).ready(function () {
    tablaHistorialEspacio()
    selectEspacio()
    selectFechasPrestamoEspacio()

});

function tablaHistorialEspacio(){
    $.ajax(
        {
            url: "./control/historialEspacio.php",
            success: function (response)
            {
                let obj_result = JSON.parse(response);
                let template = "";

                if(obj_result.length>0){
                    let mensajeArea =!!document.getElementById("mensajeArea");
                  if (mensajeArea === true){
                      document.getElementById("mensajeArea").style.display = 'none';
                      let divTablaArea= document.getElementById("tabla_AreaHistorial");
                      divTablaArea.style.display = 'block';

                  }
                  var cont=0;
                    obj_result.forEach((obj_result=>{
                        cont++;
                        template+=`<tr id_presEsp="${obj_result.id_prestamo}">
                                <th scope="row">${cont}</th>
                                 <td>${obj_result.nombre_espacio}</td>
                                <td>${obj_result.fecha_prestamo}</td>
                                <td>${obj_result.hora_inicio}</td>
                                <td>${obj_result.hora_fin}</td>
                               <td>${obj_result.notas == null ? " " : obj_result.notas}</td>
                            </tr>`;
                    }));
                    //se asigna al cuerpo de la tabla
                    $("#tbl-historialAreas").html(template);


                }else{
                    document.getElementById("tabla_AreaHistorial").style.display = 'none';
                    template=`<div class="alert alert-warning alert-dismissible fade show" role="alert" id="mensajeArea">
                                <strong>Lo sentimos</strong> No hay historial de área deportiva, vuelva mas tarde.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                    $("#contenedorMensajeArea").html(template);

                }
            }
        }
    );
}
function selectEspacio(){
    $.ajax(
        {
            url: "./control/list_areas.php",
            success: function (response)
            {
                let obj_result = JSON.parse(response);
                let template = " <option selected value='0' disabled>Selecciona el área:</option> ";
                if (obj_result.length>0) {
                    obj_result.forEach(
                        (obj_result) => {
                            template += `<option value="${obj_result.id_espacio}">${obj_result.nombre_espacio}</option>`;
                        }
                    );
                    $("#listaAreaS").html(template);
                }else{
                    $("#listaAreaS").html(`<option selected disabled> No hay áreas</option>`);
                }
            }
        }
    );
}

function selectFechasPrestamoEspacio(){
    $.ajax(
        {
            url: "./control/list_fechasEspacio.php",
            success: function (response)
            {
                let obj_result = JSON.parse(response);
                let template = " <option selected value='0' disabled>Seleccione una fecha</option> ";
                if (obj_result.length>0) {
                obj_result.forEach(
                    (obj_result)=>
                    {
                        template += `<option value="${obj_result.fecha_prestamo}">${obj_result.fecha_prestamo}</option>`;
                    }
                );
                $("#areaFechas").html(template);
                }else{
                    $("#areaFechas").html(`<option selected disabled> No hay fechas disponibles</option>`);
                }
            }
        }
    );
}
$(document).on("change",".listaD_Areas",function () {
    id_Area=$("#listaAreaS").val();
    fechaArea=$("#areaFechas").val();
    console.log(id_Area);
    if(fechaArea == null){
        //Filtros 1: solo Areas, 2: solo Fecha, 3:ambos
        tipoFiltro="1";
        fechaArea="";
        tablaPorFiltroArea(id_Area,tipoFiltro,fechaArea);
    }else{
        tipoFiltro="3";
        tablaPorFiltroArea(id_Area,tipoFiltro,fechaArea);

    }

});

$(document).on("click",".mostrarTodosArea",function () {
    fechaArea=$("#areaFechas").val(0);
    id_Area=$("#listaAreaS").val(0);
    tablaHistorialEspacio();

});
$(document).on("change",".listD_fechaArea",function () {
    fechaArea=$("#areaFechas").val();
    id_Area=$("#listaAreaS").val();

    if(id_Area == null){
        //Filtros 1: solo Area, 2: solo Fecha, 3:ambos
        tipoFiltro="2";
        id_Area="";
        tablaPorFiltroArea(id_Area,tipoFiltro,fechaArea);
    }else{
        tipoFiltro="3";
        tablaPorFiltroArea(id_Area,tipoFiltro,fechaArea);

    }

});

function tablaPorFiltroArea(id_Area,tipoFiltro,fechaArea){
    //Filtros 1: solo Areas, 2: solo Fecha, 3:ambos
    $.ajax(
        {
            url: "./control/historialFiltrosAreas.php",
            data: {
                tipoFiltroVal: tipoFiltro,
                id_AreaVal: id_Area,
                fechaAreaVal: fechaArea
            },
            type: "POST",
            success: function (response)
            {
                let obj_result = JSON.parse(response);
                let template = "";
                if(obj_result.length>0){
                    let mensajeArea =!!document.getElementById("mensajeArea");
                    if (mensajeArea === true){
                        document.getElementById("mensajeArea").style.display = 'none';
                        let divTablaArea= document.getElementById("tabla_AreaHistorial");
                        divTablaArea.style.display = 'block';

                    }
                    var cont=0;
                    obj_result.forEach((obj_result=>{
                        cont++;
                        template+=`<tr id_presEsp="${obj_result.id_prestamo}">
                                <th scope="row">${cont}</th>
                                 <td>${obj_result.nombre_espacio}</td>
                                <td>${obj_result.fecha_prestamo}</td>
                                <td>${obj_result.hora_inicio}</td>
                                <td>${obj_result.hora_fin}</td>
                               <td>${obj_result.notas == null ? " " : obj_result.notas}</td>
                            </tr>`;
                    }));
                    //se asigna al cuerpo de la tabla
                    $("#tbl-historialAreas").html(template);


                }else{
                    document.getElementById("tabla_AreaHistorial").style.display = 'none';
                    template=`<div class="alert alert-warning alert-dismissible fade show" role="alert" id="mensajeArea">
                                <strong>Lo sentimos</strong> No hay historial de área deportiva, vuelva mas tarde.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                    $("#contenedorMensajeArea").html(template);

                }
            }
        }
    );
}