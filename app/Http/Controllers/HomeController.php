<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Autoridad;
use App\Models\Personal;
use App\Models\RecibosG;
use App\Models\Sede;
use Auth;


class HomeController extends Controller
{
    public function index()
    { //invesigar como llamar a view homw
        $user = Auth::User(); 
       return view('dashboard', compact ('user'));
      
    }

}