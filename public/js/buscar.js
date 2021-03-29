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
    console.log(datos);
    $.ajax({
        headers: {'X-CSRF-TOKEN':_token},
        url: 'Enviar',
        type: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        success: function (res) {
            console.log(res);
            if(res.estado){
                MsgDetallado('alert-success', res.msg);
              //  $.ajax({
                //    url: "enviar",
                  //  context: document.body
                 // }).done(function() {
                   // location.reload();
                 // });
            }else{
                Msg(res.msg);
            }
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
function eliminarUsuario(id) {
    var tokken = $('input[name="_token"]').val();
    var ids = id;
    console.log(ids);
        Confirmar({
            ruta: 'destroy',
            data: {id:ids,tokken:tokken},
            begin:function(){
                
            },
            success:function(res){
				console.log(res);
                if(res.estado){
					MsgDetallado('alert-success', res.msg);
                    location.reload();
                }else{
                    Msg(res);
                }

            },
            error:function(jqXHR, exception){
                MsgError(jqXHR.status);
            },
            complete:function(){
                
            }
        })
    
}


function lanzar(id){
    $('#Modal').modal('show');
    //$('#span').text(nombre); // id emprendimiento
    //$('#id_usuario').val(idU);
    //$('#id_emprendimiento').val(id);
}

function MsgDetallado(tipo, Msg, idContent = "MsgForm"){
    if(tipo == 'alert-success'){
        tipo='success';
    }else if(tipo == 'alert-danger'){
        tipo='error';
    }else if(tipo == 'alert-warning'){
        tipo='warning';
    }
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr[tipo]('<div>'+Msg+'</div>');
  }

  function Msg(texto){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "2000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr['warning']('<div>'+texto+'</div>');
  }

  function MsgError(texto){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "2000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr['error']('<div>'+texto+'</div>');
  }

  function MsgEliminar(){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "2000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr['success']('<div> Registro eliminado con éxito </div>');
  }

  function Confirmar(array){
    $('#toast-container').remove();
  
    var mensaje="¿Desea eliminar el registro?";
    var tipo="error";
    if(array.mensaje!=undefined){
        mensaje=array.mensaje;
    }
    if(array.tipo!=undefined){
        tipo=array.tipo;
    }
  
    toastr[tipo]("<br /><button type='button' id='okBtn' class='btn mr-1 btn-primary'>Si</button><button type='button' id='cancelBtn' class='btn ml-1 '>No</button>",mensaje,
   {
       closeButton: false,
       allowHtml: true,
       tapToDismiss :  false,
       timeOut: 0,
       onShown: function (toast) {
           $("#okBtn").click(function(){
               var _token = token();
               array.begin();
               $.ajax({
                   url:array.ruta,
                   type: 'post',
                   headers: {'X-CSRF-TOKEN':_token },
                   data: array.data,
                   success: function(res){
                         $('#cancelBtn').click();
                         array.success(res);
                   },
                   error: function(jqXHR, exception) {
                     array.error(jqXHR, exception);
                   }
                   ,complete : function(){
                          array.complete();
                   }
               });
           });
           $("#cancelBtn").click(function(){
               toastr.remove();
           });
        }
   });
  }

  function Confirmar(array){
    $('#toast-container').remove();
  
    var mensaje="¿Desea eliminar el registro?";
    var tipo="error";
    if(array.mensaje!=undefined){
        mensaje=array.mensaje;
    }
    if(array.tipo!=undefined){
        tipo=array.tipo;
    }
  
    toastr[tipo]("<br /><button type='button' id='okBtn' class='btn mr-1 btn-primary'>Si</button><button type='button' id='cancelBtn' class='btn ml-1 '>No</button>",mensaje,
   {
       closeButton: false,
       allowHtml: true,
       tapToDismiss :  false,
       timeOut: 0,
       onShown: function (toast) {
           $("#okBtn").click(function(){
               var _token = token();
               array.begin();
               $.ajax({
                   url:array.ruta,
                   type: 'post',
                   headers: {'X-CSRF-TOKEN':_token },
                   data: array.data,
                   success: function(res){
                         $('#cancelBtn').click();
                         array.success(res);
                   },
                   error: function(jqXHR, exception) {
                     array.error(jqXHR, exception);
                   }
                   ,complete : function(){
                          array.complete();
                   }
               });
           });
           $("#cancelBtn").click(function(){
               toastr.remove();
           });
        }
   });
  }

  