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

use App\Http\Controllers\UserController;

//Listado de usuarios
Route::get('/',[UserController::class, 'list'])->name('list');

//Formulario de usuarios
Route::get('/form',[UserController::class, 'userform']);

//Guardar usuarios
Route::post('/save',[UserController::class, 'save'])->name('save');