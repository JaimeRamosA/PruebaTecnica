@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')

<div class="p-6 sm:px-20 bg-white border-b border-gray-200">

    <div class="mt-6" id="divUser">
        <div class="card">
            <div class="card-header">
                Editar Informacion del Usuario
            </div>
            <div class="card-body">
                <form action="{{route('update', $user)}}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
        
                        <div class="cc col-md-4">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-italic" id="inputGroup-sizing-sm">Nombre</span>
                                </div>
                                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
        
                        <div class="cc col-md-4">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-italic" id="inputGroup-sizing-sm">Identificacion</span>
                                </div>
                                <input type="text" class="form-control" disabled name="identificacion" id="identificacion" value="{{$user->identificacion}}" placeholder="identificacion"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
        
                        <div class="cc col-md-4">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-italic" id="inputGroup-sizing-sm">fecha_nacimiento</span>
                                </div>
                                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{$user->fecha_nacimiento}}" placeholder="fecha de nacimiento"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
        
                    </div>
        
                    <div class="row">
                        <div class="cc col-md-4">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-italic" id="inputGroup-sizing-sm">email</span>
                                </div>
                                <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" disabled aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
        
                        <div class="cc col-md-4">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-italic" id="inputGroup-sizing-sm">Telefono</span>
                                </div>
                                <input type="text" class="form-control" name="telefono" id="telefono" value="{{$user->telefono}}" placeholder="telefono"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                        
                    </div>
        
                    <div class="row">
                        <div class="cc col-md-4">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-italic" id="inputGroup-sizing-sm">pais</span>
                                </div>
                                <input type="text" class="form-control" name="pais" id="pais" value="{{$user->pais}}" placeholder="pais"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
        
                        <div class="cc col-md-4">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-italic" id="inputGroup-sizing-sm">Departamento</span>
                                </div>
                                <input type="text" class="form-control" name="estado" id="estado" value="{{$user->estado}}" placeholder="Departamento"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
        
                        <div class="cc col-md-4">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-italic" id="inputGroup-sizing-sm">Ciudad</span>
                                </div>
                                <input type="text" class="form-control" name="ciudad" id="ciudad" value="{{$user->ciudad}}" placeholder="Ciudad"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                    </div>
        
                    <div class="row modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary" >Save changes</button>
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