<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(TaskController::class)->middleware('web')->name('api.')->group(function () {
    Route::get('categories', 'index')->name('categories');
    Route::prefix('task')->group(function () {
        Route::post('create', 'store')->name('task.create');
        Route::get('{id}/show', 'show')->name('task.show');
        Route::patch('{id}/edit', 'update')->name('task.edit');
        Route::delete('{id}/destroy', 'destroy')->name('task.destroy');
    });
});
