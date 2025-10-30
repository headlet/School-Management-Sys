<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MultiRoleLoginController;

//home view
Route::view('/', 'public.index')->name('home');

//login && register
Route::get('/login', [MultiRoleLoginController::class, 'showLoginForm'])->name('login');
Route::post('/logins', [MultiRoleLoginController::class, 'login'])->name('signin');
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/registers', [UserController::class, 'store'])->name('signup');



Route::middleware('auth:admin')->group(function () {
    // admin
    Route::view('/admin/dashboard', 'admin.components.dashboard')->name('dashboard');
    Route::redirect('/admin', '/admin/dashboard');

    Route::post('/logout', [MultiRoleLoginController::class, 'logout'])->name('logout');


    // Students
    Route::controller(StudentController::class)->group(function () {
        Route::get('/admin/student', 'index')->name('student');
        Route::get('/admin/addstudent', 'create')->name('addstudent');
        Route::post('/addstd', 'store')->name("studentstore");
        Route::get('/admin/{student}/view', 'show')->name('viewstd');
        Route::get('/admin/{student}/edit', 'edit')->name('editstd');
        Route::put('/admin/{student}', 'update')->name('updatestd');
        Route::delete('/admin/{student}', 'destroy')->name('students.destroy');
    });
});


// Route::resource('admin/student', StudentController::class)->names(['index'   => 'student','create'  => 'addstudent','store'   => 'studentstore','show'    => 'viewstd','edit'    => 'editstd','update'  => 'updatestd','destroy' => 'students.destroy',]);
