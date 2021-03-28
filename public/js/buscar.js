function formData(id){
    return new FormData($('#'+id)[0]);
}

function token(){
    return $('input[name="_token"]').val();
}

function BuscarUsuario(){
    var datos=formData('formBuscar');
    var _token=token();
    $.ajax({
        headers: {'X-CSRF-TOKEN':_token},
        url: 'BuscarUsusario',
        type: 'get',
        data: datos,
        contentType: false,
        processData: false,
        success: function (res) {
            console.log(res);
            if(res.estado){
                
				if(res.ope == '0'){
                    
				}
            }else{
                Msg(res.msg);
            }
        },
        error: function(error){
          var erro = JSON.parse(error.responseText);
         
        },complete : function(){
            
        }
    });
    //{{route('buscarUsuario')}}
}

function lanzar(id){
    $('#Modal').modal('show');
    //$('#span').text(nombre); // id emprendimiento
    //$('#id_usuario').val(idU);
    //$('#id_emprendimiento').val(id);
}
