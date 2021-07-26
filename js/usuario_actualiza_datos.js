$(document).ready(function () {
    perfilAlumno();
});

function perfilAlumno(){
    let id_us_perfil = $("#id_us_perfil").val();
    $.ajax({
        url:"./control/usuario_actualizar_datos.php",
        data: {
            filtro: 1,
            id_us_perfil: id_us_perfil
        },
        type: "POST",
        success: function (response){
            let obj_result=JSON.parse(response);
            //console.log(response);
            obj_result.forEach((obj_result=>{
                //contenedor principal
                $("#nombreu").val(obj_result.nombre);
                $("#primer_apu").val(obj_result.primer_ap);
                $("#segundo_apu").val(obj_result.segundo_ap);
                $("#cuentau").val(obj_result.cuenta);
                $("#carrerau").val(obj_result.nombre_carrera);
                $("#correou").val(obj_result.correo);
                $("#telu").val(obj_result.telefono);

                //rellena el modal de editar
                $("#nombreu2").val(obj_result.nombre);
                $("#primer_apu2").val(obj_result.primer_ap);
                $("#segundo_apu2").val(obj_result.segundo_ap);
                $("#cuentau2").val(obj_result.cuenta);
                $("#carrerau2").val(obj_result.id_carrera);
                $("#correou2").val(obj_result.correo);
                $("#telu2").val(obj_result.telefono);
            }));
        }
    })
}

$(document).on("click",".act_datos_alumno",function (){
    let id_us_perfil = $("#id_us_perfil").val();
    let nombreu = $("#nombreu2").val();
    let primer_apu =  $("#primer_apu2").val();
    let segundo_apu = $("#segundo_apu2").val();
    let cuentau =  $("#cuentau2").val();
    let carrerau = $("#carrerau2").val();
    let correou = $("#correou2").val();
    let telu = $("#telu2").val();
    let filtro = 2;
    $.post(
        "./control/usuario_actualizar_datos.php",
        {filtro,id_us_perfil,nombreu,primer_apu,segundo_apu,cuentau, carrerau,
            correou, telu},
        function (responsive){
            //console.log(responsive);
            perfilAlumno();
        }
    )
});


$(document).on("click",".cambia_pass",function (){
    let id_us_perfil = $("#id_us_perfil").val();
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
            //console.log(response);
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