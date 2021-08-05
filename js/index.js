$(document).ready(function (){
    eventoCarrucel();


});

function eventoCarrucel(){
    $.ajax({
        url:"./control/list_eventos_proximos.php",
        success:function (response){
            let obj_result=JSON.parse(response);
            let template ="";
            if (obj_result.length>0){
                var cont = 0;
                //console.log(response);
            obj_result.forEach((obj_result=>{
            cont++;
                template += `
                    <div class="col-lg-4 mb-4"><div class="card">
                        <img src="${obj_result.imagen}" class="card-img-top" style="min-height: 400px; max-height: 400px;" alt="...">
                        <div class="card-body" style="min-height: 300px; max-height: 300px;">
                            <h5 class="card-title"><strong>${obj_result.nombre_actividad}</strong></h5>
                            <p class="card-text"><span class="font-weight-bold">Inicio: </span>${obj_result.fecha_inicio}<span> a las </span>${obj_result.hora_inicio}<span> hrs.</span></p>
                            <p class="card-text"><span class="font-weight-bold">Fin: </span>${obj_result.fecha_fin}<span> a las </span>${obj_result.hora_fin}<span> hrs.</span></p>
                            <p class="card-text"><span class="font-weight-bold">Descripción: </span>${obj_result.descripcion}</p>
                            <p class="card-text"><span class="font-weight-bold">Encargado(a): </span>${obj_result.encargado}</p>
                        </div>
                    </div></div>`;
            }));
            $("#carrucelX").html(template);

        }else{
            $("#carrucelX").empty();
            template=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Lo sentimos</strong> No hay eventos proximos.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
            $("#carrucelX").html(template);

}
        }
    })
}
