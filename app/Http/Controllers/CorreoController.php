<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\correo;
use Illuminate\Support\Facades\Validator;
use App\Mail\sendMailable;
use Illuminate\Support\Facades\Mail;
use Auth;
use View;

class CorreoController extends Controller
{
    public function index(){
        return view('correo.index');
    }

    public function enviar(Request $request){
        Validator::make($request->all(), [
            'asunto' => 'required',
            'destinatario' => 'required',
            'mensaje' => 'required',
        ], [
            'asunto.required' => 'Debes ingresar un asunto',
            'destinatario.required' => 'Debes ingresar un asunto',
            'mensaje.required' => 'Debes ingresar un asunto',
        ])->validate();

        $corre = correo::create($request->all());

        $view = View::make('correo.send', [
            'data' => $corre
        ]);

        //dd($view);
        $correo = new sendMailable;
        Mail::to($request->destinatario)->send($correo);

        $res = ['ope'=>'0','msg'=>'Correo Enviado con exito', 'estado'=>true , 'id'=>$corre];
        return $res;
        //return view('correo.send',compact('correo'));
    }

    public function Enviados(){
        $emails = correo::where('id_user',Auth::user()->id)->get();
        return view('correo.enviados',compact('emails'));
    }
}
