$(document).ready(function () {
    tablaPrestamoMaterial()
    selectMateriales()
    selectFechasPrestamoMaterial()

});
function tablaPrestamoMaterial(){
    $.ajax(
        {
            url: "./control/historialMateriales.php",
            success: function (response)
            {
                let obj_result = JSON.parse(response);
                let template = "";

                if(obj_result.length>0){
                    let mensajeMat =!!document.getElementById("mensajeMat");
                  if (mensajeMat === true){
                      document.getElementById("mensajeMat").style.display = 'none';
                      let divTablaMat= document.getElementById("tabla_MaterialesHistorial");
                      divTablaMat.style.display = 'block';

                  }
                      var cont = 0;
                      obj_result.forEach((obj_result => {
                          cont++;
                          template += `<tr id_presMat="${obj_result.id_prestamo_ma}">
                                <th scope="row">${cont}</th>
                                 <td>${obj_result.nombre_recurso}</td>
                                <td>${obj_result.fecha_prestamo}</td>
                                <td>${obj_result.hora_inicio}</td>
                                <td>${obj_result.hora_fin}</td>
                                <td>${obj_result.notas == null ? " " : obj_result.notas}</td>
                            </tr>`;
                      }));
                      //se asigna al cuerpo de la tabla
                      $("#tbl-historialMateriales").html(template);


                }else{
                    //$("#contenedor-historialMateriales").empty();
                    document.getElementById("tabla_MaterialesHistorial").style.display = 'none';
                    template=`<div class="alert alert-warning alert-dismissible fade show" role="alert" id="mensajeMat">
                                <strong>Lo sentimos</strong> No hay historial de material, vuelva mas tarde.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                    $("#contenedorMensajeMat").html(template);

                }
            }
        }
    );
}

function selectMateriales(){
    $.ajax(
        {
            url: "./control/list_materiales.php",
            success: function (response)
            {
                let obj_result = JSON.parse(response);
                let template = " <option selected value='0' disabled>Seleccione una material</option> ";
                if (obj_result.length>0) {
                obj_result.forEach(
                    (obj_result)=>
                    {
                        template += `<option value="${obj_result.id_recurso}">${obj_result.nombre_recurso}</option>`;
                    }
                );
                $("#materialesS").html(template);
                }else{
                    $("#materialesS").html(`<option selected disabled> No hay Materiales</option>`);
                }

            }
        }
    );
}
function selectFechasPrestamoMaterial(){
    $.ajax(
        {
            url: "./control/list_fechaMateriales.php",
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
                $("#fechaM").html(template);
                }else{
                    $("#fechaM").html(`<option selected disabled> No hay fechas disponibles</option>`);
                }
            }
        }
    );
}
$(document).on("change",".listaD_materiales",function () {
    id_Material=$("#materialesS").val();
    fechaMaterial=$("#fechaM").val();
    if(fechaMaterial == null){
        //Filtros 1: solo Material, 2: solo Fecha, 3:ambos
        tipoFiltro="1";
        fechaMaterial="";
        tablaPorFiltroMate(id_Material,tipoFiltro,fechaMaterial);
    }else{
        tipoFiltro="3";
        tablaPorFiltroMate(id_Material,tipoFiltro,fechaMaterial);

    }

});

$(document).on("click",".mostrarTodosMat",function () {
    fechaMaterial=$("#fechaM").val(0);
    id_Material=$("#materialesS").val(0);
    tablaPrestamoMaterial();

});
$(document).on("change",".listD_fechaMat",function () {
    fechaMaterial=$("#fechaM").val();
    id_Material=$("#materialesS").val();

    if(id_Material == null){
        //Filtros 1: solo Material, 2: solo Fecha, 3:ambos
        tipoFiltro="2";
        id_Material="";
        tablaPorFiltroMate(id_Material,tipoFiltro,fechaMaterial);
    }else{
        tipoFiltro="3";
        tablaPorFiltroMate(id_Material,tipoFiltro,fechaMaterial);

    }

});

function tablaPorFiltroMate(id_Material,tipoFiltro,fechaMaterial){
    //Filtros 1: solo Material, 2: solo Fecha, 3:ambos

    $.ajax(
        {
            url: "./control/historialFiltrosMateriales.php",
            data: {
                tipoFiltroV: tipoFiltro,
                id_MaterialV: id_Material,
                fechaMaterialV: fechaMaterial
            },
            type: "POST",
            success: function (response)
            {
                let obj_result = JSON.parse(response);
                let template = "";
                if(obj_result.length>0){
                    let mensajeMat =!!document.getElementById("mensajeMat");
                    if (mensajeMat === true){
                        document.getElementById("mensajeMat").style.display = 'none';
                        let divTablaMat=document.getElementById("tabla_MaterialesHistorial");
                        divTablaMat.style.display = 'block';
                    }
                    var cont = 0;
                    obj_result.forEach((obj_result => {
                        cont++;
                        template += `<tr id_presMat="${obj_result.id_prestamo_ma}">
                                <th scope="row">${cont}</th>
                                 <td>${obj_result.nombre_recurso}</td>
                                <td>${obj_result.fecha_prestamo}</td>
                                <td>${obj_result.hora_inicio}</td>
                                <td>${obj_result.hora_fin}</td>
                                <td>${obj_result.notas == null ? " " : obj_result.notas}</td>
                            </tr>`;
                    }));
                    //se asigna al cuerpo de la tabla
                    $("#tbl-historialMateriales").html(template);


                }else{
                    document.getElementById("tabla_MaterialesHistorial").style.display = 'none';
                    template=`<div class="alert alert-warning alert-dismissible fade show" role="alert" id="mensajeMat">
                                <strong>Lo sentimos</strong> No hay historial de material, vuelva mas tarde.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                    $("#contenedorMensajeMat").html(template);

                }

            }
        }
    );
}