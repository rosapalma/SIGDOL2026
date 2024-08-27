<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\PersonalImport;
use App\Imports\ImportNominaExcel;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ImportController extends Controller
{


	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {      
        return view('Administrar.Import-Update.index');
    }

    public function UpdateDataPers(Request $request)
    {
        $request->validate([
            'file' => [
                'required',
                'file'
                ],
            ]);
        // $path = $_FILES['file']['name'];
        // $name = pathinfo($path, PATHINFO_FILENAME);

        // if($request->has('vaciarDB')){
        //     DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        //     DB::table('personals')->truncate(); //vaciar tabla
        //    // DB::table('emple_sueldos')->truncate(); //vaciar tabla
        // }
        Excel::import(new PersonalImport,request()->file('file'));
        return back()->with('mensaje','Registros de personal Actualizada');
    }

    public function NomminaExcel(Request $request){
        // $request->validate([
        //     'file' => [
        //         'required',
        //         'file'
        //         ],
        //     ]);
        // $path = $_FILES['file']['name'];
        // $name = pathinfo($path, PATHINFO_FILENAME);
        // if($request->has('vaciarDB')){
        //     DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        //    DB::table('emple_conceptos')->truncate(); //vaciar tabla
        // }
        Excel::import(new ImportNominaExcel,request()->file('file'));
        return back()->with('mensaje','Las nóminas y sus respectivos conceptos han sido actualizados...');


    }


}



