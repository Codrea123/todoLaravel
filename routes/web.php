<?php

use App\Http\Controllers\SubTaskController;
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



Route::middleware('auth.session')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::post('subTasks/store',[SubTaskController::class, 'store'])->name('subTasks.store');
    Route::post('subTasks/toggleComplete/{subTask}',[SubTaskController::class, 'toggleComplete'])->name('subTasks.toggleComplete');
    Route::delete('subTasks/delete/{subTask}',[SubTaskController::class, 'destroy'])->name('subTasks.destroy');

    Route::get('/tasks/index',[TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create',[TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store',[TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/edit/{task}',[TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/tasks/update/{task}',[TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/delete/{task}',[TaskController::class, 'destroy'])->name('tasks.destroy');


    Route::delete('/vendors/delete/{vendor}', [VendorController::class, 'destroy'])->name('vendors.destroy');
    Route::get('/vendors/create',[VendorController::class, 'create'])->name('vendors.create');
    Route::get('/vendors/index',[VendorController::class, 'index'])->name('vendors.index');
    Route::get('/vendors/edit/{vendor}',[VendorController::class, 'edit'])->name('vendors.edit');
    Route::post('/vendors/update/{vendor}',[VendorController::class, 'update'])->name('vendors.update');
    Route::post('/vendors/store',[VendorController::class, 'store'])->name('vendors.store');

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
