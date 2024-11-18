<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Pipes\WindowsPipes;

Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');

Route::get('register',[AuthController::class,'create'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.store');

Route::group(['middleware'=>'auth'],function(){
});

Route::get('client', [AuthController::class, 'client'])->name('client'); 
Route::post('applications',[ApplicationController::class, 'store'])->name('applications.store');
//Route::get('/users/{user}', [AuthController::class, 'destroy'])->name('users.destroy');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('manager', [AuthController::class, 'manager'])->name('manager');
Route::get('applications/{application}/create',[AnswerController::class, 'create'])->name('answers.create');
Route::post('applications/{application}/create', [AnswerController::class, 'store'])->name('answers.store');
Route::get('applications/{application}/edit',[AnswerController::class, 'edit'])->name('answers.edit');
Route::post('applications/{application}/edit',[AnswerController::class, 'update'])->name('answers.update');
Route::get('applications/{application}/destroy',[AnswerController::class,'destroy'])->name('applications.destroy');





Route::get('/welcome',function(){
    return view('welcome');
});

Route::get('/railway',function(){
    return view('railway');
});