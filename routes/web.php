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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/seleccionar/proyecto/{id}', [App\Http\Controllers\HomeController::class, 'selectProject'])->name('selectProject');

Route::get('/reportar', [App\Http\Controllers\IncidentController::class, 'create'])->name('create'); 
Route::post('/reportar', [App\Http\Controllers\IncidentController::class, 'store'])->name('store'); 


Route::get('/ver/{id}', [App\Http\Controllers\IncidentController::class, 'show'])->name('show'); 


Route::group(['middleware' => 'admin','namespace' => 'admin'], function(){
    //User
    Route::get('/usuarios', [App\Http\Controllers\admin\UserController::class, 'index'])->name('index');
    Route::post('/usuarios', [App\Http\Controllers\admin\UserController::class, 'store'])->name('store');

    Route::get('/usuario/{id}', [App\Http\Controllers\admin\UserController::class, 'edit'])->name('edit');
    Route::post('/usuario/{id}', [App\Http\Controllers\admin\UserController::class, 'update'])->name('update');
    
    Route::get('/usuario/{id}/eliminar', [App\Http\Controllers\admin\UserController::class, 'delete'])->name('delete');

    //Project

    Route::get('/proyectos', [App\Http\Controllers\admin\ProjectController::class, 'index'])->name('index');
    Route::post('/proyectos', [App\Http\Controllers\admin\ProjectController::class, 'store'])->name('store');

    Route::get('/proyecto/{id}', [App\Http\Controllers\admin\ProjectController::class, 'edit'])->name('edit');
    Route::post('/proyecto/{id}', [App\Http\Controllers\admin\ProjectController::class, 'update'])->name('update');

    Route::get('/proyecto/{id}/eliminar', [App\Http\Controllers\admin\ProjectController::class, 'delete'])->name('delete');

    Route::get('/proyecto/{id}/restaurar', [App\Http\Controllers\admin\ProjectController::class, 'restore'])->name('restore');

    //Category

    Route::post('/categorias', [App\Http\Controllers\admin\CategoryController::class, 'store'])->name('store');
    Route::post('/categoria/editar', [App\Http\Controllers\admin\CategoryController::class, 'update'])->name('update');
    Route::get('/categoria/{id}/eliminar', [App\Http\Controllers\admin\CategoryController::class, 'delete'])->name('delete');

    //Levels

    Route::post('/niveles', [App\Http\Controllers\admin\LevelController::class, 'store'])->name('store');
    Route::post('/nivel/editar', [App\Http\Controllers\admin\LevelController::class, 'update'])->name('update');
    Route::get('/nivel/{id}/eliminar', [App\Http\Controllers\admin\LevelController::class, 'delete'])->name('delete');

    //Projec-User

    Route::post('/proyecto-usuario', [App\Http\Controllers\admin\ProjectUserController::class, 'store'])->name('store'); 
    Route::get('/proyecto-usuario/{id}/eliminar', [App\Http\Controllers\admin\ProjectUserController::class, 'delete'])->name('delete'); 

    Route::get('/config', [App\Http\Controllers\admin\ConfigController::class, 'index'])->name('index');
});