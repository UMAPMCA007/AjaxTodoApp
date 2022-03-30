<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::get('/', [TodoController::class,'index']);
Route::get('/view_todos', [TodoController::class,'view'])->name('viewTodo');
Route::post('/store_todos',[TodoController::class,'store'])->name('storeTodo');
Route::put('/edit_todo',[TodoController::class,'edit'])->name('editTodo');
Route::put('/update_todo',[TodoController::class,'update'])->name('updateTodo');
Route::delete('/delete_todo',[TodoController::class,'destroy'])->name('deleteTodo');

