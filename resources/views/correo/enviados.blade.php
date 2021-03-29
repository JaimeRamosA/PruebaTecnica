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
                Salidas
            </div>
            <div class="card-body">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                      <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Name
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Mensaje
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Status
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if($emails->count())
                            @foreach($emails as $i => $mail) 
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                      <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                          <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                        </div>
                                        <div class="ml-4">
                                          <div class="text-sm font-medium text-gray-900">
                                            Asunto: {{$mail->asunto}}
                                          </div>
                                          <div class="text-sm text-gray-500">
                                            to:{{$mail->destinatario}}
                                          </div>
                                          <div class="text-sm text-gray-500">
                                            {{$mail->created_at}}
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                      <div class="text-sm text-gray-500">{{$mail->mensaje}}</div> 
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{$mail->estado}}
                                      </span>
                                    </td> 
                                  </tr>
                            @endforeach
                             
                        @else
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-warning">
                                        No se encontraron mails
                                    </div>
                                </td>
                            </tr>
                        @endif 
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="5" class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> {{ $emails->links() }}</td>
                      </tr>
                    </tfoot>
        
                  </table>
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