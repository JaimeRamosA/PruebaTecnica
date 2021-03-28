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
}
