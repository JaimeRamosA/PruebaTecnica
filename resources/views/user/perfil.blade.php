@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')

<div class="p-6 sm:px-20 bg-white border-b border-gray-200">

    <div class="mt-6" id="divUser">
        <div class="card">
            <div class="card-header">
                Informacion del Usuario
              </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        Nombre:
                        <label for="">{{ Auth::user()->name}}</label>
                    </div>
                    <div class="col-md-4">
                        Cedula:
                        <label for="">{{ Auth::user()->identificacion}}</label>
                    </div>
                    <div class="col-md-4">
                        Edad:
                        <label for="">{{ $edad = Carbon\Carbon::parse(Auth::user()->fecha_nacimiento)->age}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Correo:
                        <label for="">{{ Auth::user()->email}}</label>
                    </div>
                    <div class="col-md-4">
                        Telefono:
                        <label for="">{{ Auth::user()->telefono}}</label>
                    </div>
                    <div class="col-md-4">
                        Localidad:
                        <label for="">{{ Auth::user()->ciudad}},{{ Auth::user()->estado}},{{ Auth::user()->pais}}</label>
                    </div>
                </div>
                
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