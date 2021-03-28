@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')

<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    
    @if(session("mensaje") && session("tipo") )
        <div class="alert alert-{{session('tipo')}} alert-dismissible fade show" role="alert">
            {{session('mensaje')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mt-6" id="divUser">
        {{--<div class="box-body" >
            <example-component></example-component>
        </div>--}}
        
        <livewire:users />
    </div>

    {{--<div class="mt-6 text-gray-500">
        Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
        to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
        you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
        ecosystem to be a breath of fresh air. We hope you love it.
    </div> --}}
</div>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Datos de Usuario <span id="span" class="badge badge-primary"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="MBody" class="modal-body" style="text-align: center;">
            <form action="#" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">
                <div class="row">

                    <div class="cc col-md-4">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-italic" id="inputGroup-sizing-sm">Nombre</span>
                                <input type="hidden" class="hidden" id="id_usuario" name="id_usuario" value="">
                            </div>
                            <input type="text" class="form-control" name="name" id="name" value="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>

                    <div class="cc col-md-4">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-italic" id="inputGroup-sizing-sm">Identificacion</span>
                            </div>
                            <input type="text" class="form-control" name="identificacion" id="identificacion" value="" placeholder="identificacion"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>

                    <div class="cc col-md-4">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-italic" id="inputGroup-sizing-sm">fecha_nacimiento</span>
                            </div>
                            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="" placeholder="fecha de nacimiento"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="cc col-md-4">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-italic" id="inputGroup-sizing-sm">email</span>
                            </div>
                            <input type="text" class="form-control" name="email" id="email" value="" placeholder="telefono"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>

                    <div class="cc col-md-4">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-italic" id="inputGroup-sizing-sm">Telefono</span>
                            </div>
                            <input type="text" class="form-control" name="telefono" id="telefono" value="" placeholder="telefono"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="cc col-md-4">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-italic" id="inputGroup-sizing-sm">pais</span>
                            </div>
                            <input type="text" class="form-control" name="pais" id="pais" value="" placeholder="pais"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>

                    <div class="cc col-md-4">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-italic" id="inputGroup-sizing-sm">Departamento</span>
                            </div>
                            <input type="text" class="form-control" name="estado" id="estado" value="" placeholder="Departamento"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>

                    <div class="cc col-md-4">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-italic" id="inputGroup-sizing-sm">Ciudad</span>
                            </div>
                            <input type="text" class="form-control" name="ciudad" id="ciudad" value="" placeholder="Ciudad"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>

                <div class="row modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary" >Save changes</button>
                </div>
            </form>
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

