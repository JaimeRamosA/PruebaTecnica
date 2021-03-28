
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead>
              <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Movil
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Role
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if($users->count())
                    @foreach($users as $i => $usuario) 
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                  <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                </div>
                                <div class="ml-4">
                                  <div class="text-sm font-medium text-gray-900">
                                    {{$usuario->name}}
                                  </div>
                                  <div class="text-sm text-gray-500">
                                    {{$usuario->identificacion}}
                                  </div>
                                  <!--<div class="text-sm text-gray-500">
                                    {{$usuario->fecha_nacimiento}}
                                  </div>-->
                                  <div class="text-sm text-gray-500">
                                    {{$edad = Carbon\Carbon::parse($usuario->fecha_nacimiento)->age}} Años
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm text-gray-500">{{$usuario->email}}</div>
                              <div class="text-sm text-gray-900">{{$usuario->telefono}}</div>
                              <div class="text-sm text-gray-500">{{$usuario->ciudad}}, {{$usuario->estado}}, {{$usuario->pais}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                              </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              {{$usuario->roles->implode('name', ',')}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                              <!--<a href="#" id="md" type="button" onclick="lanzar('{{$usuario->id}}')" class="text-indigo-600 hover:text-indigo-900">Edit</a>-->
                              <div class="row">
                                <div class="col">
                                  <a href="{{route('edit', $usuario->id)}}" id="" type="button"  class="btn btn-sm btn-outline-info">Edit</a>
                                </div>

                                <div class="col">
                                  <form action="{{route('destroy', $usuario->id)}}" method="POST">
                                      {{csrf_field()}}
                                      <input type="hidden" name="_method" value="DELETE">
                                      <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                  </form>
                                </div>
                              </div>
                              
                            </td>
                          </tr>
                    @endforeach
                     
                @else
                    <tr>
                        <td colspan="5">
                            <div class="alert alert-warning">
                                No se encontraron usuarios
                            </div>
                        </td>
                    </tr>
                @endif 
              
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5" class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> {{ $users->links() }}</td>
              </tr>
            </tfoot>

          </table>
        </div>
      </div>
    </div>
</div>
