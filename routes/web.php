<?php

use App\Models\Task;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ClientController;

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

            //login route 

Route::post('/hello',[AuthController::class,'check'])->name('login');

Route::get('/login', [AuthController::class,'index']);

            //registre route 
Route::get('/registre',[AuthController::class,'registre']);
Route::post('/registre',[AuthController::class,'store']);

            //admin route 
Route::middleware(['can:admin'])->group(function() {
    Route::get('/admin',[Admin::class,'index']);
});

            //client route 

Route::middleware(['can:client'])->group(function() {

    Route::get('/taskForm',[TaskController::class,'index']);
    Route::post('/client',[TaskController::class,'store'])->name('taskForm');
    Route::get('/client',[TaskController::class,'show'])->name('client.show');
    Route::delete('/delete/{id}',[TaskController::class,'destroy']);
});










