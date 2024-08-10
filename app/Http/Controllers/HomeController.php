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
    { // desde /config.fortify.php
        $user = Auth::User(); 
       return view('home', compact ('user'));
      
    }

}