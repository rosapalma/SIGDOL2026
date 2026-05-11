<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\PersonalImport;
use App\Imports\ImportNominaExcel;
use App\Imports\BeneficiariosImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Models\Beneficiario;

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
        //     //DB::table('personals')->truncate(); //vaciar tabla
        //     DB::table('personals')->truncate(); //vaciar tabla
        // }
        set_time_limit(600);
        try{
            Excel::import(new PersonalImport,request()->file('file'));
            return back()->with('mensaje','Registros de personal Actualizada');   
        } catch(\Maatwebsite\Excel\Validators\ValidationException $e) {
                $failure = $e->failures()[0]; 
                return back()->withErrors("Error en fila {$failure->row()}: " . implode(', ', $failure->errors()));
        }
      
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
        set_time_limit(600);
        try{
             Excel::import(new ImportNominaExcel,request()->file('file'));
            return back()->with('mensaje','Las nóminas y sus respectivos conceptos han sido actualizados...');
        } catch(\Maatwebsite\Excel\Validators\ValidationException $e) {
                $failure = $e->failures()[0]; 
                return back()->withErrors("Error en fila {$failure->row()}: " . implode(', ', $failure->errors()));
         }
       
    }

    public function BeneficiariosExcel(Request $request){   
         if($request->has('vaciarDB')){
                Beneficiario::truncate(); //vaciar tabla
         
        }  
        set_time_limit(600);
        Excel::import(new BeneficiariosImport,request()->file('file'));
        return back()->with('mensaje','carga completada...');
    }


}



