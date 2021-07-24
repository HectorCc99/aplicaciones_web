$(document).on("click",".iniciar_sesion",function () {
    let correo=$("#correoT").val().trim();
    let contraseniaIngresada=$("#contraseniaT").val().trim();
    if($.trim(correo).length>0 && $.trim(contraseniaIngresada).length>0)
    {
         $.ajax({
             url:"./control/listaUsuariosRegistrados.php",
             data:{
                 correo:correo
             },
             type: "POST",
             success: function (response) {
                 let obj_result = JSON.parse(response);
                 if (obj_result.length > 0) {//Si hay usuarios Registrados
                     obj_result.forEach((obj_result=>{
                         let id_usuario=obj_result.id_usuario;
                         let contraseniaBD=obj_result.contrasenia;
                         conversionContraseniaIngresada(contraseniaIngresada,id_usuario,contraseniaBD);
                     }));

                 }else{
                     alert("Error datos incorrectos, favor de verificar la información.");

                 }
             }
         })
     }else{
        alert("Error, Ingresa todos los datos.")
    }
})
function conversionContraseniaIngresada(contraseniaIngresada,id_usuario,contraseniaBD){
    let contrasenia_Ingresada=contraseniaIngresada;
    let id_usuario_BD= id_usuario;
    let contrasenia_BD=contraseniaBD;
    $.ajax({
        url: './control/conversion_Md5_Contrasenia.php',
        type: "POST",
       dataType:'json',
        data: ({
            contraseniaIngresada: contrasenia_Ingresada
        }),
        success:function(data) {
            let contraseniaConvertida=data;
           
            if(contrasenia_BD == contraseniaConvertida) {
                validacionAdmin(id_usuario_BD);
               

            }else{
                alert("Error contraseña incorrectos, favor de verificar la información.");
            }
        }
    });
}

function validacionAdmin(id_usuario_BD){
    let idUsuarioA=id_usuario_BD;
    $.ajax({
        url:"./control/validacionLoginAdmin.php",
        data: {
            idUsuario: idUsuarioA
        },
        type: "POST",
        success: function (response) {
            let obj_result = JSON.parse(response);

            if (obj_result.length > 0) {//Si hay Admin Registrados y activo
                obj_result.forEach((obj_result=>{
                    let id_admin=obj_result.id_admin;
                    let tipoSesion=1;
                    sesionAdmin(tipoSesion,id_admin);
                }));

            }else{
                let tipoSesion=2;
                sesionUsuario(tipoSesion,idUsuarioA);

            }
        }
    })
}
function sesionAdmin(tipoSesion,id_admin){
    var tipoSesion =tipoSesion;
    var id_admin = id_admin;

    var dataString2 = 'tipoSesion='+tipoSesion+'&id_usuario='+id_admin;
    $.ajax({
        url: "./control/validacionLogin.php",
        data: dataString2,
        type: "POST",
        success: function (response) {

            window.location.href="index.php";

        }
    })
}
function sesionUsuario(tipoSesion,idUsuarioA){
    var tipoSesion =tipoSesion;
    var id_usuario = idUsuarioA;

    $.ajax({
        url: "./control/validacionLogin.php",
        data: {
            tipoSesion:tipoSesion,
            id_usuario:id_usuario
        },
        type: "POST",
        success: function (response) {

            window.location.href="indexus.php";
        }
    })
}
