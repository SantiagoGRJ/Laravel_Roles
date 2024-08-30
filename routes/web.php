<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index')->middleware(['auth','can:admin.index'])->name('admin.index'); 
    Route::get('/admin/create', 'create')->middleware('auth')->name('admin.create');
    Route::post('/admin', 'store')->middleware('auth')->name('admin.store');
    Route::get('/admin/{id}', 'show')->middleware('auth')->name('admin.show');
    Route::get('/admin/{id}/edit', 'edit')->middleware('auth')->name('admin.edit');
    Route::put('/admin/{id}', 'update')->middleware('auth')->name('admin.update');
    Route::delete('/admin/{id}', 'destroy')->middleware('auth')->name('admin.destroy');
});

//Route::resource('student', StudentController::class);
Route::controller(StudentController::class)->group(function () {
    Route::get('/student', 'index')->middleware(['auth','can:student.index'])->name('student.index');
    Route::post('/student', 'store')->middleware('auth')->name('student.store');
    Route::get('/student/create', 'create')->middleware('auth')->name('student.create');
    Route::get('/student/{id}', 'show')->middleware('auth')->name('student.show');
    Route::get('/student/{id}/edit', 'edit')->middleware('auth')->name('student.edit');
    Route::put('/student/{id}', 'update')->middleware('auth')->name('student.update');
    Route::delete('/student/{id}', 'destroy')->middleware('auth')->name('student.destroy');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/user','index')->middleware(['auth'])->name('user.index');
    Route::get('/user/create','create')->middleware(['auth'])->name('user.create');
    Route::post('/user','store')->middleware(['auth'])->name('user.store');
    Route::get('user/{id}','show')->middleware(['auth'])->name('user.show');
    Route::get('/user/{id}/edit','edit')->middleware(['auth'])->name('user.edit');
    Route::put('/user/{id}','update')->middleware(['auth'])->name('user.update');
    Route::delete('/user/{id}','delete')->middleware(['auth'])->name('user.delete');

});

require __DIR__.'/auth.php';
