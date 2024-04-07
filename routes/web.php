<?php

use App\Http\Controllers\admin\AdminAsController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminManagerController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\AdminStudentController;
use App\Http\Controllers\admin\AdminTaskController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\manager\AsTaskController;
use App\Http\Controllers\manager\ManagerController;
use App\Http\Controllers\manager\ManagerProfileController;
use App\Http\Controllers\manager\ManagerStudentController;
use App\Http\Controllers\manager\ManagerTaskController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\student\StudentProfileController;
use App\Http\Controllers\student\StudentTaskCotroller;
use App\Models\Student;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function (){
    Route::middleware(RedirectIfAuthenticated::class)->group(function(){
        Route::get('/' , 'login_view')->name('login');
        Route::post('/' , 'login');
    });
    Route::post('logout', 'logout')->name('logout');
});
Route::prefix('admin')->name('admin.')->middleware(Authenticate::class)->group(function(){
    Route::get('/index' ,[AdminController::class , 'index'])->name('index');

    Route::controller(AdminProfileController::class)->group(function (){
     Route::get('profile' , 'show')->name('profile');
     Route::patch('details', 'details')->name('details');
     Route::patch('password', 'password')->name('password');
     Route::patch('picture', 'picture')->name('picture');

    });

    Route::controller(AdminManagerController::class)->group(function (){
       Route::get('manager/index' , 'index')->name('manager.index');
       Route::get('manager/create' , 'create')->name('manager.create');
       Route::post('manager/create' , 'store');
       Route::get('manager/{manager}/show' , 'show')->name('manager.show');
       Route::get('manager/{manager}/edit' , 'edit')->name('manager.edit');
       Route::post('manager/{manager}/edit' , 'update');
       Route::delete('manager/{manager}/delete', 'destroy')->name('manager.destroy');
    });

    Route::controller(AdminStudentController::class)->group(function (){
       Route::get('student/index' , 'index')->name('student.index');
       Route::get('student/create' , 'create')->name('student.create');
       Route::post('student/create' , 'store');
       Route::get('student/{student}/show' , 'show')->name('student.show');
       Route::get('student/{student}/edit' , 'edit')->name('student.edit');
       Route::post('student/{student}/edit' , 'update');
       Route::delete('student/{student}/delete', 'destroy')->name('student.destroy');
    });

    Route::controller(AdminTaskController::class)->group( function (){
        Route::get('task/index' , 'index')->name('task.index');

    });

    Route::get('astask/index'  ,[AdminAsController::class  ,'index'])->name('astask.index');
});

Route::prefix('manager')->name('manager.')->group(function(){
    Route::get('/index' , [ManagerController::class , 'index'])->name('index');

    Route::controller(ManagerProfileController::class)->group(function (){
        Route::get('profile' , 'show')->name('profile');
        Route::patch('details', 'details')->name('details');
        Route::patch('password', 'password')->name('password');
        Route::patch('picture', 'picture')->name('picture');

    });

    Route::controller(AsTaskController::class)->group(function(){
        Route::get('/atask/index' , 'index')->name('atask.index');
        Route::get('/atask/create' , 'create')->name('atask.create');
        Route::post('/atask/create' , 'store');
       Route::get('/atask/{assingtask}/show' , 'show')->name('atask.show');
       Route::delete('/atask/{assingtask}/delete' , 'destroy')->name('atask.destroy');

    });

    // Route::get('send' ,[HomeController::class  ,  'sendnotification']);

    Route::controller(ManagerStudentController::class)->group(function(){
    Route::get('/student/index' , 'index')->name('student.index');
    Route::get('student/{student}/show' , 'show')->name('student.show');

    });

    Route::controller(ManagerTaskController::class)->group(function (){
        Route::get('/task/index' , 'index')->name('task.index');
    });

});


Route::prefix('student')->name('student.')->middleware( Authenticate::class)->group(function(){
 Route::get('/index' , [StudentController::class , 'index'])->name('index');

 Route::controller(StudentProfileController::class)->group(function (){
    Route::get('profile' , 'show')->name('profile');
    Route::patch('details', 'details')->name('details');
    Route::patch('password', 'password')->name('password');
    Route::patch('picture', 'picture')->name('picture');
 });

 Route::controller(StudentTaskCotroller::class)->group(function (){

    Route::get('task/index' , 'index')->name('task.index');
    Route::post('task/{assingtask}/progress' , 'progress')->name('task.progress');
    Route::post('task/{assingtask}/complete' , 'complete')->name('task.complete');

 });

});


