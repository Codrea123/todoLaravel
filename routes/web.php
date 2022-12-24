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

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::prefix('/subTasks')->group(function () {
        Route::post('subTasks/store',[SubTaskController::class, 'store'])->name('subTasks.store');
        Route::post('subTasks/toggleComplete/{subTask}',[SubTaskController::class, 'toggleComplete'])->name('subTasks.toggleComplete');
        Route::delete('subTasks/delete/{subTask}',[SubTaskController::class, 'destroy'])->name('subTasks.destroy');
    });

    Route::prefix('/tasks')->group(function () {
        Route::get('index',[TaskController::class, 'index'])->name('tasks.index');
        Route::get('create',[TaskController::class, 'create'])->name('tasks.create');
        Route::post('store',[TaskController::class, 'store'])->name('tasks.store');
        Route::get('edit/{task}',[TaskController::class, 'edit'])->name('tasks.edit');
        Route::post('update/{task}',[TaskController::class, 'update'])->name('tasks.update');
        Route::delete('delete/{task}',[TaskController::class, 'destroy'])->name('tasks.destroy');
        Route::post('toggle/{task}', [TaskController::class ,'toggleCompleted'])->name('tasks.toggle');
    });

});
Auth::routes();
