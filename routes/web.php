<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    return view('welcome');
});

Route::post('/testSoal1', 'App\Http\Controllers\TestController@hitungSoalNomor1');
Route::post('/testSoal2', 'App\Http\Controllers\TestController@hitungSoalNomor2');
Route::post('/testSoal3', 'App\Http\Controllers\TestController@hitungSoalNomor3');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
