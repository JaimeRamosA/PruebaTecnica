function formData(id){
    return new FormData($('#'+id)[0]);
}

function token(){
    return $('input[name="_token"]').val();
}

function cleanForm(idformulario) {
    $('#'+idformulario)[0].reset();
}

function nuevoCorreo(){
    cleanForm('FormEnviar');
}

function enviar(){
    var datos=formData('FormEnviar');
    var _token=token();
    $.ajax({
        headers: {'X-CSRF-TOKEN':_token},
        url: 'Enviar',
        type: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        success: function (res) {
            console.log(res);
            //if(res.ope == 0){
              //  $.ajax({
                //    url: "enviar",
                  //  context: document.body
                 // }).done(function() {
                   // location.reload();
                 // });
            //}
            //location.reload();
            
        },
        error: function(error){
          var erro = JSON.parse(error.responseText);
          console.log(error);
          nuevoCorreo();
        },complete : function(){
            //EnableSave('Usuarios');
        }
        
    });
}


function lanzar(id){
    $('#Modal').modal('show');
    //$('#span').text(nombre); // id emprendimiento
    //$('#id_usuario').val(idU);
    //$('#id_emprendimiento').val(id);
}
