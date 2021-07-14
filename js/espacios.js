// activamos escucha
$(document).ready(function () {
    if(tabla){
        tablaespacios();
    }else{
        lista_desplegable();
    }
});


function tablaespacios(){


}

function lista_desplegable(){
    $.ajax({
        url:"./control/list_espacios.php",
        success: function (response){
            let obj_result=JSON.parse(response);
            let template="";
            if(obj_result.length>0){
                var cont=0;
                obj_result.forEach((obj_result=>{
                    cont++;
                    template+=`<option value="${obj_result.id_espacio}">${obj_result.nombre_espacio}</option>`;
                }));
                //se asigna al cuerpo de la tabla
                $("#lugar").html(template);
                $("#lugar_edit").html(template);
            }else{
                $("#lista_desplegable").empty();
                template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Lo sentimos</strong> No hay espacios recreativos disponibles, por favor registre uno.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                $("#lista_desplegable").html(template);
            }
        }
    })
}