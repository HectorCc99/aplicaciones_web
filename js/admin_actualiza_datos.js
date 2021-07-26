
$(document).ready(function () {
    perfilAdmin();
});

function perfilAdmin(){
    let id_ad_perfil = $("#id_ad_perfil").val();
    $.ajax({
        url:"./control/admin_actualizar_datos.php",
        data: {
            filtro: 1,
            id_ad_perfil: id_ad_perfil
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);
            //console.log(response);
            obj_result.forEach((obj_result=>{
                //contenedor principal
                $("#id_usad").val(obj_result.id_usuario);
                $("#nombreA").val(obj_result.nombre);
                $("#primer_apA").val(obj_result.primer_ap);
                $("#segundo_apA").val(obj_result.segundo_ap);
                $("#numtrab").val(obj_result.cuenta);
                $("#telA").val(obj_result.telefono);
                $("#correoA").val(obj_result.correo);


                //rellena el modal de editar
                $("#nombreA2").val(obj_result.nombre);
                $("#primer_apA2").val(obj_result.primer_ap);
                $("#segundo_apA2").val(obj_result.segundo_ap);
                $("#numtrab2").val(obj_result.cuenta);
                $("#telA2").val(obj_result.telefono);
                $("#correoA2").val(obj_result.correo);
            }));
        }
    })
}

$(document).on("click",".act_datos_admin",function (){
    let id_usad = $("#id_usad").val();
    let nombreA2 = $("#nombreA2").val();
    let primer_apA2 =  $("#primer_apA2").val();
    let segundo_apA2 = $("#segundo_apA2").val();
    let numtrab2 =  $("#numtrab2").val();
    let telA2 = $("#telA2").val();
    let correoA2 = $("#correoA2").val();
    let filtro = 2;
    $.post(
        "./control/admin_actualizar_datos.php",
        {filtro,id_usad,nombreA2,primer_apA2,segundo_apA2,numtrab2, telA2,
            correoA2},
        function (responsive){
            //console.log(responsive);
            perfilAdmin();
        }
    )
});


$(document).on("click",".cambia_pass",function (){
    let id_us_perfil = $("#id_usad").val();
    let contraseñaAct=$("#pass-actual").val();
    let contraseña=$("#pass-nueva").val();
    let repeticion=$("#pass-repetida").val();
    if(repeticion!="" && contraseña!="" && contraseñaAct!=""){
        if(contraseña==repeticion ){
            conversionContraseniaIngresada(contraseñaAct,id_us_perfil,contraseña);
        }else{
            alert("La nueva contraseña no coincide con la validacion")
        }
    }else {
        alert("Llene todos los campos por favor");
    }
});

function conversionContraseniaIngresada(contraseniaIngresada,id_us_perfil,contraseña){
    let contrasenia_Ingresada=contraseniaIngresada;
    $.ajax({
        url: './control/conversion_Md5_Contrasenia.php',
        type: "POST",
        dataType:'json',
        data: ({
            contraseniaIngresada: contrasenia_Ingresada
        }),
        success:function(data) {
            let contraseñamd5=data;
            valida_contraseña(id_us_perfil,contraseñamd5,contraseña);
        }
    });

}

function valida_contraseña(id_us_perfil,contraseñamd5,contraseña){
    $.ajax({
        url:"./control/usuario_actualizar_datos.php",
        data: {
            filtro: 1,
            id_us_perfil: id_us_perfil
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);
            //console.log(id_us_perfil);
            obj_result.forEach((obj_result=>{
                //contenedor principal
                if(contraseñamd5==obj_result.contrasenia){

                    cambia_contraseña_usuario(id_us_perfil,contraseña);
                }else{
                    alert("La contraseña actual no es correcta");
                }
            }));
        }
    })
}

function cambia_contraseña_usuario(id_us_perfil,contraseña){
    $.ajax({
        url:"./control/usuario_actualizar_datos.php",
        data: {
            filtro: 3,
            id_us_perfil: id_us_perfil,
            contrasenia: contraseña
        },
        type: "POST",
        success: function (response){
            alert("Contraseña Acctualizada");
            location.reload();

        }
    })
}