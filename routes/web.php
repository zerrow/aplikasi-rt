<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/form', 'HomeController@form');

// Route::get('/login2', function() {
//     return redirect('/login');
// });

Route::prefix('rw')->name('rw.')->middleware(['auth', 'rw', 'warga'])->group(function (){
    require 'rw.php';
});
Route::prefix('rt')->name('rt.')->middleware(['auth', 'rt', 'warga'])->group(function (){
    require 'rt.php';
});
Route::prefix('warga')->name('warga.')->middleware(['auth', 'warga'])->group(function (){
    require 'warga.php';
});
