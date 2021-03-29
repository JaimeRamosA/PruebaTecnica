<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function buscarUsuario(Request $request){
        $user = User::where($request->select_buscar, 'like', '%'.$request->dataSearch.'%')->paginate(100);
        return view('search', compact('user'))->render();
    }

    public function edit($id){
        $user  = User::find($id);
        return  view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        User::find($id)->update([
            'name' => $request['name'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'telefono' => $request['telefono'],
            'pais' => $request['pais'],
            'estado' => $request['estado'],
            'ciudad' => $request['ciudad'],
        ]);

        $tipo = 'success';
        return redirect()->route('dashboard')->with('mensaje', 'Registro Actualizado')->with("tipo", $tipo);
    
    }

    public function destroy(Request $request)
    {
        User::find($request->id)->delete();
        $tipo = 'danger';
        $res = ['ope'=>'0','msg'=>'Registro Eliminado', 'estado'=>true ];
        return $res;
        //return redirect()->route('dashboard')->with('mensaje', 'Registro Eliminado')->with("tipo", $tipo);
    }

    
}
