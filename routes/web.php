<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
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
});

Route::post('/auth/save', [AuthController::class, 'save'])->name('auth.save');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');




Route::middleware(['AuthCheck'])->group(function () {
    Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard']);
    Route::get('/student/add', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('/student/update/{id}', [StudentController::class, 'update']);
    Route::post('/student/destroy/{id}', [StudentController::class, 'destroy']);



});