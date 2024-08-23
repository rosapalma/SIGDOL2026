<?php

namespace App\Http\Controllers;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Redirect;

class UsersController extends Controller
{
    public function index() 
    {      
        return view('import');
    }
    //PRUEBAS IMPORT 
    public function import(Request $request) 
    {      
        $request->validate([
        'file' => [
            'required',
            'file'
            ],
        ]);
        Excel::import(new UsersImport, $request->file('file'));
        return redirect()->back()->with('mensaje','Importación exitosa');
    }
}
