<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//home view
Route::get('/', function () {
    return view('public.index');
})->name('home');

//login && register
Route::get('/login', [UserController::class, 'index'])->name('Login');
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/registers', [UserController::class , 'store'])->name('signup');


// admin
Route::get('/admin', function () {
    return redirect()->route('dashboard');
});
Route::get('/admin/dashboard', function(){
    return view('admin.components.dashboard');
})->name('dashboard');


// Students
Route::get('/admin/student', [StudentController::class, 'index'])->name('student');
Route::get('/admin/addstudent', [StudentController::class, 'create'])->name('addstudent');
Route::post('/addstd', [StudentController::class, 'store'])->name("studentstore");
Route::delete('/admin/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/admin/{student}/view',[StudentController::class, 'show'])->name('viewstd');
Route::get('/admin/{student}/edit', [StudentController::class, 'edit'])->name('editstd');
Route::put('/admin/{student}', [StudentController::class, 'update'])->name('updatestd');
