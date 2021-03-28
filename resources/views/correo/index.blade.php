@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')

<div class="p-6 sm:px-20 bg-white border-b border-gray-200">

    <div class="mt-6" id="divUser">

        @if(session("msg"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('msg')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                Mensaje Nuevo
            </div>
            <div class="card-body">
                <!--action="{{route('Enviar')}}" method="post"-->
                <form id="FormEnviar"  >
                    {{csrf_field()}}
                    <div class="mb-3">
                        <input type="hidden" name="id_user" id="id_user" value="{{Auth::user()->id}}">
                        <input type="email" class="form-control " name="destinatario" id="destinatario" placeholder="name@example.com">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Mensaje</label>
                        <textarea class="form-control" name="mensaje" id="mensaje" rows="3"></textarea>
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="nuevoCorreo()">Nuevo</button>
                        <button type="button" class="btn btn-sm btn-primary" onclick="enviar()">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        
        
        
    </div>

    
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop