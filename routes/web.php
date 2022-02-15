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
//Guest page
Route::get('/', function () {
    return view('auth.login');
});

//user login and registection
Auth::routes();

//Dashbord User
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");

//Task route create, edit, Delete.
Route::get('/creat/task', [App\Http\Controllers\HomeController::class, 'CreatTask'])->name('creat.task');
Route::post('/add/task', [App\Http\Controllers\HomeController::class, 'AddTask'])->name('add.task');
Route::get('/delete/task/{id}', [App\Http\Controllers\HomeController::class, 'DeleteTask'])->name('delete.task');
Route::get('/edit/task/{id}', [App\Http\Controllers\HomeController::class, 'EditTask'])->name('edit.task');
Route::post('/Update/task/{id}', [App\Http\Controllers\HomeController::class, 'UpdateTask'])->name('update.task');

//task done or notdone
Route::post('/done/task/{id}', [App\Http\Controllers\HomeController::class, 'DoneTask'])->name('done.task');
Route::post('/notdone/task/{id}', [App\Http\Controllers\HomeController::class, 'NotdoneTask'])->name('notdone.task');

//Tesk orderby Desc due_date
Route::get('/desc/due_date/', [App\Http\Controllers\HomeController::class, 'DescDuedate'])->name('desc.due_date');
//Tesk orderby Asc due_date
Route::get('/asc/due_date/', [App\Http\Controllers\HomeController::class, 'AscDuedate'])->name('asc.due_date');
