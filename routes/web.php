<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectFileController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});


Route::controller(DashboardController::class)->middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard.index');
});

Route::controller(ProjectController::class)->middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/project/list', 'index')->name('project.index');
    Route::get('/project/create', 'create')->name('project.create');
    Route::post('/project/store', 'store')->name('project.store');
    Route::get('/project/show/{id}', 'show')->name('project.show');
    Route::get('/project/edit/{id}', 'edit')->name('project.edit');
    Route::put('/project/update/{id}', 'update')->name('project.update');
    Route::delete('/project/delete/{id}', 'destroy')->name('project.delete');
});

Route::controller(ProjectFileController::class)->middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/project/file/create/{id}', 'create')->name('project.file.create');
    Route::post('/project/file/store', 'store')->name('project.file.store');
    Route::get('/project/file/show/{id}', 'show')->name('project.file.show');
    Route::get('/project/file/download/{id}', 'download')->name('project.file.download');
    Route::get('/project/file/edit/{id}', 'edit')->name('project.file.edit');
    Route::put('/project/file/update/{doc}', 'update')->name('project.file.update');
    Route::delete('/project/file/delete/{doc}', 'destroy')->name('project.file.delete');
});
