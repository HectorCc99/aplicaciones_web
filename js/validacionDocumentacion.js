$(document).ready(function () {
    validarEstatus();
})
function validarEstatus(){
    let id_usuario = $("#id_usuario").val();
    var count="";
    $.ajax({
        url:"./control/validacion_archivos.php",
        data: {
            id_alumno: id_usuario,
            filtro:2
        },
        type: "POST",
        success: function (response) {
            let obj_result=JSON.parse(response);
            if (obj_result.length > 0) {
                obj_result.forEach((obj_result => {
                    count++;
                }))
                console.log(count);
                if (count < 4) {
                    alert("¡Para poder inscribir un deporte primero debes subir toda tu documentación!");
                    location.href="indexus.php";
                }
            }else{
                alert("¡Para poder inscribir un deporte primero debes subir toda tu documentación!");
                location.href="indexus.php";
            }

        }
    })
}
