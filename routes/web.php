<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NewsController;
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
    return view('welcome');
});

Route::middleware(['OpenAdminLoginWhenPasswordIsNotCorrect'])->group(function () {
    Route::get('/admin', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/admin', [LoginController::class, 'loginSubmit'])->name('admin.login.submit');
});

Route::middleware(['OpenAdminPanelWhenPasswordIsCorrect'])->group(function () {
    Route::get('/admin/news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/news/', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/admin/news/{news}/update', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/news/{news}/delete', [NewsController::class, 'delete'])->name('admin.news.delete');
});
