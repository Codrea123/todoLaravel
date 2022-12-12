<?php

use App\Http\Controllers\subTaskController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Auth;
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
})->middleware('auth');

Route::post('subTasks/store',[subTaskController::class, 'store'])->name('subTasks.store')->middleware('auth');
Route::post('subTasks/toggleComplete/{subTask}',[subTaskController::class, 'toggleComplete'])->name('subTasks.toggleComplete')->middleware('auth');
Route::delete('subTasks/delete/{subTask}',[subTaskController::class, 'destroy'])->name('subTasks.destroy')->middleware('auth');

Route::get('/tasks/index',[TaskController::class, 'index'])->name('tasks.index')->middleware('auth');
Route::get('/tasks/create',[TaskController::class, 'create'])->name('tasks.create')->middleware('auth');
Route::post('/tasks/store',[TaskController::class, 'store'])->name('tasks.store')->middleware('auth');
Route::get('/tasks/edit/{task}',[TaskController::class, 'edit'])->name('tasks.edit')->middleware('auth');
Route::post('/tasks/update/{task}',[TaskController::class, 'update'])->name('tasks.update')->middleware('auth');
Route::delete('/tasks/delete/{task}',[TaskController::class, 'destroy'])->name('tasks.destroy')->middleware('auth');


Route::delete('/vendors/delete/{vendor}', [VendorController::class, 'destroy'])->name('vendors.destroy');
Route::get('/vendors/create',[VendorController::class, 'create'])->name('vendors.create');
Route::get('/vendors/index',[VendorController::class, 'index'])->name('vendors.index');
Route::get('/vendors/edit/{vendor}',[VendorController::class, 'edit'])->name('vendors.edit');
Route::post('/vendors/update/{vendor}',[VendorController::class, 'update'])->name('vendors.update');
Route::post('/vendors/store',[VendorController::class, 'store'])->name('vendors.store');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
