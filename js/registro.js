$(document).ready(function () {
   lista_carreras()

});
/*name
primer_ap
segundo_ap
cuenta
carreras
email
tel
clave
clave_confirm*/
//escucha que se acciona al dar clic al boton
$(document).on("click",".registrar",function () {
    let nombre=$("#name").val();
    let primera=$("#primer_ap").val();
    let segunda=$("#segundo_ap").val();
    let cuenta=$("#cuenta").val();
    let carrera=$("#carreras").val();
    let email=$("#email").val().toLowerCase();
    let tel=$("#tel").val();
    let clave=$("#clave").val();
    let clave_co=$("#clave_confirm").val();
    if(clave == clave_co){
    if(nombre !="", primera !="",segunda!="",cuenta!="", carrera!="",
    email!="",tel!="", clave!="",clave_co!=""){
    $.post(
        "./control/registro_usuario.php",
        {nombre, primera, segunda, cuenta, carrera, email, tel, clave, clave_co},
        function (responsive){
            console.log(responsive);
          window.location.href="login.php";
        }
    )}else{
        alert("Los campos no pueden estar vacios");
    }
    }else{
        alert("La contraseña no coincide");
    }
})

function lista_carreras(){
    $.ajax(
        {
            url: "./control/list_carreras.php",
            success: function (response)
            {
                let obj_result = JSON.parse(response);
                let template = " <option selected disabled>Seleccionar carrera</option> ";
                obj_result.forEach(
                    (obj_result)=>
                    {
                        template += `<option value="${obj_result.id_carrera}"> ${obj_result.nombre} </option>`;
                    }
                );
                $("#carreras").html(template);
                $("#carrerau").html(template);
                $("#carrerau2").html(template);
            }
        }
    );
}