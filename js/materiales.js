$(document).ready(function () {
   ListaMateriales();

});
function agregarRecurso(){

}

$(document).on("click",".editar_datos",function () {

    let id_elemento=$("#id_material").val();
    let nombre=$("#material").val();
    let piezas=$("#piezas").val();
    let filtro=2;
    $.post(
        "./control/modifica_detalles_recurso.php",
        {id_elemento,filtro,nombre,piezas},
        function (responsive){
            //console.log(responsive);
            ListaMateriales();
        }
    )
});

$(document).on("click",".editar_elemento",function () {
    //Accedo al tr y el tr tiene un atributo de id
    let element = $(this)[0].parentElement.parentElement.parentElement.parentElement;
    //console.log(element);
    /*console.log(id);
    console.log(estatus_grupo);*/
    let id_elemento=$(element).attr("id_recurso");
    let filtro=3;
    $.post(
        "./control/modifica_detalles_recurso.php",
        {id_elemento,filtro},
        function (responsive){
            //console.log(responsive);
            let obj_result=JSON.parse(responsive);
            obj_result.forEach((obj_result=> {
                $("#id_material").val(id_elemento);
                $("#material").val(obj_result.nombre_recurso);
                $("#piezas").val(obj_result.cantidad);
            }));
            ListaMateriales();
        }
    )
});

$(document).on("click",".eliminar_elemento",function () {
    //Accedo al tr y el tr tiene un atributo de id
    let element = $(this)[0].parentElement.parentElement.parentElement.parentElement;
    let id_elemento=$(element).attr("id_recurso");
    let filtro=4;
    $.post(
        "./control/modifica_detalles_recurso.php",
        {id_elemento,filtro},
        function (responsive){
            //console.log(responsive);
            ListaMateriales();
        }
    )
});


$(document).on("click",".agregar_nuevo",function () {

    let nombre=$("#material_nuevo").val();
    let piezas=$("#piezas_nuevas").val();
    let filtro=1;
    $.post(
        "./control/modifica_detalles_recurso.php",
        {filtro,nombre,piezas},
        function (responsive){
            //console.log(responsive);
            ListaMateriales();
        }
    )
});

function ListaMateriales(){
    $.ajax({
        url:"./control/list_rec_recreativo.php",

        success: function (response){
            let obj_result=JSON.parse(response);
            let template="";
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    //console.log(response);
                    cont++;
                    template+=`<tr id_recurso="${obj_result.id_recurso}">
                                    <td>${obj_result.nombre_recurso}</td>
                                    <td>${obj_result.cantidad}</td>
                                    <td>
                                        <!--BOTON OPCIONES-->
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Opciones
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                <button class="dropdown-item editar_elemento" type="button" data-toggle="modal" data-target="#modalEditar">Editar
                                                </button>
                                                <button class="dropdown-item eliminar_elemento" type="button">Eliminar</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#tbl-materiales").html(template);
            }else{
                $("#tbl-materiales").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert"  style="  width: 100%;">
                                <strong>Lo sentimos</strong> No hay horarios registrados.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#tbl-materiales").html(template);
            }
        }
    })
}