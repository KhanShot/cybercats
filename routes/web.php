<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route("login");
});

Auth::routes();

Route::prefix('admin')->group(function (){
    Route::get('', [\App\Http\Controllers\AdminController::class, 'index']);

    Route::prefix('subjects')->group(function (){
        Route::get('', [\App\Http\Controllers\SubjectController::class, 'index'])->name('subject.index');
        Route::get('create', [\App\Http\Controllers\SubjectController::class, 'create'])->name('subject.create');
        Route::get('edit/{s_id}', [\App\Http\Controllers\SubjectController::class, 'edit'])->name('subject.edit');
        Route::delete('delete/{s_id}', [\App\Http\Controllers\SubjectController::class, 'delete'])->name('subject.delete');
        Route::post('update/{s_id}', [\App\Http\Controllers\SubjectController::class, 'update'])->name('subject.update');
        Route::post('store', [\App\Http\Controllers\SubjectController::class, 'store'])->name('subject.store');
    });

    Route::prefix('topics')->group(function (){
        Route::get('', [\App\Http\Controllers\TopicController::class, 'index'])->name('topics.index');
        Route::get('create', [\App\Http\Controllers\TopicController::class, 'create'])->name('topics.create');
        Route::get('edit/{t_id}', [\App\Http\Controllers\TopicController::class, 'edit'])->name('topics.edit');
        Route::delete('delete/{t_id}', [\App\Http\Controllers\TopicController::class, 'delete'])->name('topics.delete');
        Route::post('update/{t_id}', [\App\Http\Controllers\TopicController::class, 'update'])->name('topics.update');
        Route::post('store', [\App\Http\Controllers\TopicController::class, 'store'])->name('topics.store');
    });

    Route::prefix('content')->group(function (){
        Route::get('', [\App\Http\Controllers\ContentController::class, 'index'])->name('content.index');
        Route::get('create', [\App\Http\Controllers\ContentController::class, 'create'])->name('content.create');
        Route::get('edit/{c_id}', [\App\Http\Controllers\ContentController::class, 'edit'])->name('content.edit');
        Route::delete('delete/{c_id}', [\App\Http\Controllers\ContentController::class, 'delete'])->name('content.delete');
        Route::post('update/{c_id}', [\App\Http\Controllers\ContentController::class, 'update'])->name('content.update');
        Route::post('store', [\App\Http\Controllers\ContentController::class, 'store'])->name('content.store');
    });
});
