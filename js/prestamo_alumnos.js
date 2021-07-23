
$(document).ready(function (){
    ListaMateriales();
    lista_desplegable();
})



$(document).on("click",".reservar_materiales",function () {
    let id_alumno=$("#id_alumno").val();
    let material=$("#material").val();
    let fechaP=$("#fechaP").val();
    let hora_solicitada=$("#hora_solicitada").val();
    let hora_lim=$("#hora_lim").val();
    let filtro=1;
    $.post(
        // url de la pagina
        "./control/registrar_prestamo.php",
        // datos a enviar
        {id_alumno,material,fechaP,hora_solicitada,hora_lim,filtro},
        // funcion que realiza si es exitoso mi envio
        function (responsive){
            // compruebo lo que me regresa la funcion
            //console.log(responsive);
            // recargo la tabla con el id del area seleccionada previamente
            ListaMateriales();
            lista_desplegable();
            alert("Solicitud de prestamo enviada");
        }
    )
});

$(document).on("click",".reservar_area",function () {
    let id_alumno=$("#id_alumno").val();
    let material=$("#area").val();
    let fechaP=$("#fechaA").val();
    let hora_solicitada=$("#hora_inicioA").val();
    let hora_lim=$("#hora_limiteA").val();
    let filtro=2;
    $.post(
        // url de la pagina
        "./control/registrar_prestamo.php",
        // datos a enviar
        {id_alumno,material,fechaP,hora_solicitada,hora_lim,filtro},
        // funcion que realiza si es exitoso mi envio
        function (responsive){
            // compruebo lo que me regresa la funcion
            //console.log(responsive);
            // recargo la tabla con el id del area seleccionada previamente
            ListaMateriales();
            lista_desplegable();
            alert("Solicitud de prestamo enviada");
        }
    )
});

$(document).on("change",".hora_solicitada",function () {
    let hora_solicitada=$("#hora_solicitada").val();
    var hora = hora_solicitada.split(":");
    let hora_fin=parseInt(hora[0])+2;
    let material=hora_fin+":"+hora[1];
    console.log(material);
    $("#hora_lim").val(material);
});

$(document).on("change",".area_solicitada",function () {
    let hora_solicitada=$("#hora_inicioA").val();
    var hora = hora_solicitada.split(":");
    let hora_fin=parseInt(hora[0])+2;
    let material=hora_fin+":"+hora[1];
    console.log(material);
    $("#hora_limiteA").val(material);
});



function lista_desplegable(){
    $.ajax({
        url:"./control/list_espacios.php",
        success: function (response){
            let obj_result=JSON.parse(response);
            let template=`<option disabled selected>seleccione...</option>`;

                var cont=0;
                obj_result.forEach((obj_result=>{
                    cont++;
                    template+=`<option value="${obj_result.id_espacio}">${obj_result.nombre_espacio}</option>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#area").html(template);


        }
    })
}

function ListaMateriales(){
    $.ajax({
        url:"./control/list_rec_recreativo.php",

        success: function (response){
            let obj_result=JSON.parse(response);
            let template="";

                var cont=0;
                obj_result.forEach((obj_result=>{
                    //console.log(response);
                    cont++;
                    template+=`<option value="${obj_result.id_recurso}">
                                    ${obj_result.nombre_recurso}
                                </option>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#material").html(template);


        }
    })
}