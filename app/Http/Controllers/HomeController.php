<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Autoridad;
use App\Models\Personal;
use App\Models\RecibosG;
use App\Models\Sede;
use Auth;
use Session;



class HomeController extends Controller
{

    public function index()
    { // desde /config.fortify.php
        if(Auth::User()->statud == 0){
            Session::flush(); //cerrar seccion, ojo: evitar que se abra la seccion
            return back()->with('error','Ya no se encuentra activo consulte al administrador para poder iniciar seccion');
        }else{
            $user = Auth::User(); 
            return view('home', compact ('user'));
        }
    }

}