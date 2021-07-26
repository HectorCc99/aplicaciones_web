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
                console.log(response);
            obj_result.forEach((obj_result=>{
            cont++;
            template += `<div class="blog-item">
                <div class="blog-img">
                <img src="${obj_result.imagen}" alt="" width="60px">
            </div>
                <div class="blog-text">
                    <h2>${obj_result.nombre_actividad}</h2>
                    <div class="blog-meta">
                        <p><span class="font-weight-bold">Inicio: </span>${obj_result.fecha_inicio}</p>
                        <p>${obj_result.hora_inicio}</p>
                    </div>
                    <div class="blog-meta">
                        <p><span class="font-weight-bold">Cierre: </span>${obj_result.fecha_fin}</p>
                        <p>${obj_result.hora_fin}</p>
                    </div>
                    <p>
                        Descripción del evento: ${obj_result.descripcion}
                    </p>
                    <div class="blog-meta">
                        <p><span class="font-weight-bold">Encargado(a): </span>${obj_result.encargado}</p>
                        <!--<p><span className="font-weight-bold">Cupo: </span>30</p>-->
                    </div>
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
