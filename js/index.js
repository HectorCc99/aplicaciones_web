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
                template += `<div class="card">
                        <img src="${obj_result.imagen}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">${obj_result.nombre_actividad}</h5>
                            <p class="card-text"><span class="font-weight-bold">Inicio: </span>${obj_result.fecha_inicio}</p>
                            <p class="card-text">${obj_result.hora_inicio}</p>
                            <p class="card-text"><span class="font-weight-bold">Fin: </span>${obj_result.fecha_fin}</p>
                            <p class="card-text">${obj_result.hora_fin}</p>
                            <p class="card-text">Descripción del evento: ${obj_result.descripcion}</p>
                            <p class="card-text"><span class="font-weight-bold">Encargado(a): </span>${obj_result.encargado}</p>
                        </div>
                    </div>`;
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
