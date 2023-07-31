<?php

use App\Http\Controllers\TaskController;
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
    // route untuk halaman home
Route::get('/', function () {
        return view('home');
    })->name('home'); 
    // route untuk halaman tasks
// Route::get('/tasks/', [TaskController::class, 
//     'index'])->name('tasks.index'); 
//     // route untuk halaman edit
//     // penjelasan {id} -> ini ada Path untukTaskEdit
// Route::get('/tasks/{id}/edit', [TaskController::class,
//     'edit'])->name('tasks.edit'); 

 // mengkelompokkan route diatas
 Route::prefix('tasks')
    ->name('tasks.')
    ->controller(TaskController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        // memperbarui data (update)
        Route::put('/{id}', 'update')->name('update');
        // menghapus data
        Route::get('{id}/delete', 'delete')->name('delete');
        Route::delete('{id}/delete', 'destroy')->name('destroy');
        // tambah route edit
        Route::get('{id}/edit', 'edit')->name('edit');
        // route untuk progress
        Route::get('progress', 'progress')->name('progress');
        // route untuk move
        Route::patch('{id}/move', 'move')->name('move');
    });