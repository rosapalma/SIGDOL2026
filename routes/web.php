<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ConstanciaController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\UsersController; // pruebas import

use App\Http\Controllers\PDFController;
use Illuminate\Http\Request;




Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //   return view('dashboard');
    // })->name('dashboard');
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    

    Route::get('/users', function () {
    $users = Auth::User();
    return view('users', compact('users'));
    })->name('users');

    //SOLICITAR (modal) Y GENERAL Docs
    Route::post('/contancia-de-trabajo', [ConstanciaController::class, 'Const'])->name('GeneralConst');
    Route::post('/recibo-de-pago', [ReciboController::class, 'Recibo'])->name('GeneralRecibo');
    
    Route::get('/viewimport',[App\Http\Controllers\ImportController::class, 'index']);
    Route::post('/importpers',[App\Http\Controllers\ImportController::class, 'UpdateDataPers']);
    Route::post('/importNominaExcel',[App\Http\Controllers\ImportController::class, 'NomminaExcel']);


});


// IMPORT PRUEBAS

Route::get('/viewimport',[App\Http\Controllers\UsersController::class, 'index']);
Route::post('/importpers',[App\Http\Controllers\UsersController::class, 'UpdateDataPers']);









Route::get('/salir', function(){
    Auth::logout();
    return Redirect::to('/')->with('msj', 'Gracias por visitarnos!.');
});



