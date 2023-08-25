<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');

Route::get('/produto/create', [ProdutoController::class, 'create']);
Route::post('/produto/create', [ProdutoController::class, 'store']);

Route::get('/produto/{id}', [ProdutoController::class, 'show']);

Route::get('/produto/{id}/edit', [ProdutoController::class, 'edit']);

Route::delete('/produto/{id}', [ProdutoController::class, 'destroy']);
Route::put('/produto/{id}' , [ProdutoController::class, 'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//------------------------categoria-------------------------

Route::get('/', function () {
    return view('welcome');
});


Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');

Route::get('/categoria/create', [CategoriaController::class, 'create']);
Route::post('/categoria/create', [CategoriaController::class, 'store']);

Route::get('/categoria/{id}', [CategoriaController::class, 'show']);

Route::get('/categoria/{id}/edit', [CategoriaController::class, 'edit']);

Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy']);
Route::put('/categoria/{id}' , [CategoriaController::class, 'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');