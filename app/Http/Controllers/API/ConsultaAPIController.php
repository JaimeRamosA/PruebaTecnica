<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\correo;
use Response;

class ConsultaAPIController extends Controller
{
    public function listar(){
        $emails = correo::where('estado','SEND')->orderBy('created_at', 'desc')->paginate(10);
        return response()->json(['data'=>$emails,'success'=>true,'message'=>'Search ejecuted successfully']);
    }

    public function Buscar(Request $request){
        $correo = correo::where($request->select_buscar, 'like', '%'.$request->dataSearch.'%')->paginate(100);
        return response()->json(['data'=>$correo,'success'=>true,'message'=>'Search ejecuted successfully']);
    }


}
