<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

// to do controller start
Route::middleware('auth')->group(function(){
Route::get('/todos/index', [TodoController::class, 'index'])->name('todos.index');
Route::get('/create/todo', [TodoController::class, 'create_todo'])->name('create.todo');
Route::post('/todo/store', [TodoController::class, 'todo_store'])->name('todo.store');
Route::get('/task/view/{task_id}', [TodoController::class, 'task_view'])->name('task.view');
Route::get('/task/edit/{task_id}', [TodoController::class, 'task_edit'])->name('task.edit');
Route::post('/task/update/{task_id}', [TodoController::class, 'task_update'])->name('task.update');
Route::get('/task/delete/{task_id}', [TodoController::class, 'task_delete'])->name('task.delete');
Route::post('/task/toggle-status', [TodoController::class, 'toggleStatus'])->name('task.toggleStatus');
});
// to do controller end
