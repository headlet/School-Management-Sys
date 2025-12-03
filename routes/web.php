<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MultiRoleLoginController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TeacherController;

//home view
Route::view('/', 'public.index')->name('home');

//login && register
Route::get('/login', [MultiRoleLoginController::class, 'showLoginForm'])->name('login');
Route::post('/logins', [MultiRoleLoginController::class, 'login'])->name('signin');
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/registers', [UserController::class, 'store'])->name('signup');



Route::middleware('auth:admin')->group(function () {
    // admin
    Route::get('/admin/dashboards', [dashboardController::class, 'index'])->name('dashboard');
    Route::redirect('/admin', '/admin/dashboard');


    Route::post('/logout', [MultiRoleLoginController::class, 'logout'])->name('logout');

    // Students
    Route::controller(StudentController::class)->group(function () {
        Route::get('/admin/student', 'index')->name('student');
        Route::get('/studentcard', 'card')->name('stdcard');
        Route::get('/admin/addstudent', 'create')->name('addstudent');
        Route::post('/addstd', 'store')->name("studentstore");
        Route::get('/admin/{student}/view', 'show')->name('viewstd');
        Route::get('/admin/{student}/edit', 'edit')->name('editstd');
        Route::put('/admin/{student}', 'update')->name('updatestd');
        Route::delete('/admin/{student}', 'destroy')->name('students.destroy');
    });


    //Teacher
    Route::controller(TeacherController::class)->group(function () {
        Route::get('/admin/teacher', 'index')->name('teacher');
        Route::get('/teachercart', 'card')->name("teachercard");
        Route::get('/admin/addteacher', 'create')->name('addteacher');
        Route::get('/admin/{teacher}/show', 'show')->name('teachershow');
        Route::get('/admin/{teacher}', 'edit')->name('editteacher');
        Route::post('admin/', 'store')->name('teacherstore');
        Route::put('/admin/teacher/{teacher}', 'update')->name('updateteacher');
        Route::delete('/admin/teacher/{teacher}', 'destroy')->name('teacher.destroy');
    });

    //gallery
    Route::controller(GalleryController::class)->group(function () {
        Route::get('/gallery', 'index')->name('gallery');
        Route::post('/gallery/post', 'store')->name('uploadimg');
        Route::delete('/gallery/{gallery}', 'destroy')->name('deleteimg');
    });



    //class
    Route::get('/class', [ClassesController::class, 'index'])->name('classes');
    Route::get('/newclass', [ClassesController::class, 'create'])->name('newclass');
    Route::get('/addclass', [ClassesController::class, 'store'])->name('storeclass');

});




// Route::resource('admin/student', StudentController::class)->names(['index'   => 'student','create'  => 'addstudent','store'   => 'studentstore','show'    => 'viewstd','edit'    => 'editstd','update'  => 'updatestd','destroy' => 'students.destroy',]);
