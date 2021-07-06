function agregardatos(nombre,area,sexo,correo) {
    cadena= "nombre="+ nombre +"&area="+ area  + "&sexo=" + sexo + "&correo=" + correo;
    
    $.ajax({
        type:"POST",
        url:"php/agregardatos.php",
        data: cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('componentes/tabla.php');
                alertify.success("Se agregó con éxito :) ");
            } 
            else{
                alertify.error("Falló el servidor :(");
            }
        }
    });
}
 
function agregaform(datos){
    d=datos.split('||');
    $('#id').val(d[0]);
    $('#nombre1').val(d[1]);
    $('#descripcion1').val(d[2]);
    $('#categoria1').val(d[3]);
    $('#estatus1').val(d[4]);
}


function actualizadatos(){

    id=$('#id').val();
    nombre=$('#nombre1').val();
    area=$('#descripcion1').val();
    sexo=$('#categoria1').val();
    correo=$('#estatus1').val();

    cadena="id=" + id + "&nombre="+ nombre + "&area=" +  area + "&sexo=" + sexo + "&correo=" + correo;

    $.ajax({
        type:"POST",
        url:"php/actualizadatos.php",
        data: cadena,
        success:function(r){
            if(r==1){
             $('#tabla').load('componentes/tabla.php');
              alertify.success("Se actualizo con exito :)");
            }
            else{
                alertify.error("Fallo el servidor :(");
            }
        }

    });

}


function preguntarSiNo(id) {
    alertify.confirm('Eliminar datos', '¿Está seguro que desea eliminar el registro?', 
                function(){ eliminardatos(id) }
                , function(){ alertify.error('Cancelar')});

}

function eliminardatos(id) {
    cadena="id=" + id;
    $.ajax({
        type:"POST",
        url:"php/eliminardatos.php",
        data: cadena,
        success:function(r){
            if(r==1){
             $('#tabla').load('componentes/tabla.php');
              alertify.success("Se eliminó con exito :)");
            }
            else{
                alertify.error("Fallo el servidor :(");
            }
        }

    });
}