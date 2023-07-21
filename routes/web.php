<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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


Route::get('/', function (){
    return view('home');
});
// menggunakan method prefix dan method group untuk merapihkan 7 Route
// Route::prefix('users')
//     ->controller(UserController::class)
//     ->group(function() {
//     Route::get('/','index');
//     Route::get('/create','create');
//     Route::post('/','store');
//     Route::get('/{$id}','show');
//     Route::get('/{$id}/edit','edit');
//     Route::put('/{$id}','update');
//     Route::delete('/{$id}','destroy');
// });

// Route::get('/', [HomeController::class, 'welcome']);