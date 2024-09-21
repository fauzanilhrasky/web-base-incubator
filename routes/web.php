<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // home user
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // home admin
    Route::get('/home-admin', [App\Http\Controllers\HomeController::class, 'adminHome'])->middleware('superadmin')->name('admin.home');
    // home mentor
    Route::get('/home-mentor', [App\Http\Controllers\HomeController::class, 'adminMentor'])->name('admin.mentor')->middleware('superadmin');

    
    Route::get('/course-admin', [CourseController::class, 'index'])->name('course.index');
    Route::get('/create-course-admin', [CourseController::class, 'create'])->name('course.create');
    Route::post('/store-course-admin', [CourseController::class, 'store'])->name('course.store');
    Route::get('/show-course-admin/{course}', [CourseController::class, 'show'])->name('course.show');
   
    Route::get('/edit-course-admin/{course}', [CourseController::class, 'edit'])->name('course.edit');
    Route::put('/edit-course-admin/{course}', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/{course}', [CourseController::class, 'destroy'])->name('course.destroy');


    // user
    Route::get('/detail-course/{course}', [HomeController::class, 'detail'])->name('course.detail');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('/blank-page', [App\Http\Controllers\HomeController::class, 'blank'])->name('blank');

    Route::get('/hakakses', [App\Http\Controllers\HakaksesController::class, 'index'])->name('hakakses.index')->middleware('superadmin');
    Route::get('/hakakses/edit/{id}', [App\Http\Controllers\HakaksesController::class, 'edit'])->name('hakakses.edit')->middleware('superadmin');
    Route::put('/hakakses/update/{id}', [App\Http\Controllers\HakaksesController::class, 'update'])->name('hakakses.update')->middleware('superadmin');
    Route::delete('/hakakses/delete/{id}', [App\Http\Controllers\HakaksesController::class, 'destroy'])->name('hakakses.delete')->middleware('superadmin');
});
