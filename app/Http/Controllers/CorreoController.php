<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\correo;
use Illuminate\Support\Facades\Validator;
use App\Mail\sendMailable;
use Illuminate\Support\Facades\Mail;
use Auth;
use View;
//use Mail;

class CorreoController extends Controller
{
    public function index(){
        return view('correo.index');
    }

    public function enviar(Request $request){

        //dd(Auth::user()->email, $request->all());
        Validator::make($request->all(), [
            'asunto' => 'required',
            'destinatario' => 'required',
            'mensaje' => 'required',
        ], [
            'asunto.required' => 'Debes ingresar un asunto',
            'destinatario.required' => 'Debes ingresar un asunto',
            'mensaje.required' => 'Debes ingresar un asunto',
            
        ])->validate();
        
        $corre = correo::create([
            'id_user' => Auth::user()->email,
            'destinatario' => $request->destinatario,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'estado' => 'SEND'
        ]);
        //dd($corre);
        
        $subject = $request->asunto;
        $for = $request->destinatario;
        $mensaje = $request->mensaje;

        //$nombre  = Auth::where('email',$remitente)->pluck('name');

        Mail::send('correo.send',['mensaj' => $mensaje] , function($msj) use($subject,$for){
            $msj->from([Auth::user()->email],"admin");
            $msj->subject($subject);
            $msj->to($for);
        });
        

        $view = View::make('correo.send', [
            'data' => $corre
        ]);

        //dd($view);
        //$correo = new sendMailable;
        //Mail::to($request->destinatario)->send($correo);

        $res = ['ope'=>'0','msg'=>'Correo Enviado con exito', 'estado'=>true , 'id'=>$corre];
        return $res;
        //return view('correo.send',compact('correo'));
    }

    public function Enviados(){
        $emails = correo::where('id_user',Auth::user()->email)->orderBy('created_at', 'desc')->paginate(10);
        return view('correo.enviados',compact('emails'));
    }


}
