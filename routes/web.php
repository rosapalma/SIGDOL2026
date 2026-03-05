<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ConstanciaController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\ImportController;
//use App\Http\Controllers\PSController;


use App\Livewire\ResetPasswordComponent;
use App\Livewire\ShowPosts;
use App\Livewire\DocsGenerados;
use App\Livewire\RegisterUser;
use App\Livewire\AdmUsers;
use App\Livewire\DefinirAutoridad;
use Illuminate\Http\Request;
use App\Livewire\ForgotPassw;
use App\Livewire\DeletNominaComponet;





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
    //ADMINISTRAR
    Route::get('/administrar-usuarios', AdmUsers::class)->name('adm-users');
    Route::get('/registro-usuarios',RegisterUser::class)->name('register-users');
    Route::get('/DefAutoridad',DefinirAutoridad::class)->name('autoridad');
    Route::get('/DocsGenerados',DocsGenerados::class)->name('ViewDocs');
});

//FORGOT PASSWORD
Route::get('/forgot-passw',ForgotPassw::class)->name('restore-passw');





Route::get('/salir', function(){
    Auth::logout();
    return Redirect::to('/')->with('msj', 'Gracias por visitarnos!.');
});




