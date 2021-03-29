@extends('layouts.invitado')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="margin-top: 20px;">
                <div class="card-header">
                    {{ __('Consultas') }}

                </div>
                <div class="card-body">
                    <example-component></example-component>
                    
                    <tabla-component></tabla-component>
                    
                    
   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection