<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ConstanciaController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\UsersController; // pruebas import

use App\Livewire\ShowPosts;
use App\Livewire\DocsGenerados;

use Illuminate\Http\Request;




// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/','login'); //al login directament


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //   return view('dashboard');
    // })->name('dashboard');
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    


    // SOLICITAR 
    Route::post('/contancia-de-trabajo', [ConstanciaController::class, 'Const'])->name('GeneralConst');
    Route::post('/recibo-de-pago', [ReciboController::class, 'Recibo'])->name('GeneralRecibo');
    
    // IMPORT DATA
    Route::get('/viewimport',[App\Http\Controllers\ImportController::class, 'index'])->name('viewimport');
    Route::post('/importpers',[App\Http\Controllers\ImportController::class, 'UpdateDataPers']);
    Route::post('/importNominaExcel',[App\Http\Controllers\ImportController::class, 'NomminaExcel']);

     // Route::get('/users', function () {
    // $users = Auth::User();
    // return view('Administrar.AdmUsers.index', compact('users'));
    // })->name('users');

    //  Documentos Generados/repostes------
    // Route::get('/DocsGenerados',function(){
    //     return view('Administrar.DocsGenerados.index');
    // })->name('ViewDocs');

    Route::get('/DocsGenerados',DocsGenerados::class)->name('ViewDocs');


});


// IMPORT PRUEBAS

Route::get('/now', function (){
    return view('Datatime');
    //now()->toDateTimeString();
});

Route::get('/prueba',ShowPosts::class);

Route::get('/import',[App\Http\Controllers\UsersController::class, 'index']);
Route::post('/importusers',[App\Http\Controllers\UsersController::class, 'import']);









Route::get('/salir', function(){
    Auth::logout();
    return Redirect::to('/')->with('msj', 'Gracias por visitarnos!.');
});



