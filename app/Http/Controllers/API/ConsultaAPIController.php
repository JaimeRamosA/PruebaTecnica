<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\correo;
use Response;

class ConsultaAPIController extends Controller
{
    public function listar(){
        $emails = correo::where('estado',NULL)->orderBy('created_at', 'desc')->paginate(10);
        return response()->json(['data'=>$emails,'success'=>true,'message'=>'Search ejecuted successfully']);
    }


}
