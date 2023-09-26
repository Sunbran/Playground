<?php

use App\Http\Middleware\PasswordAuthTask;
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
    return view('welcome');
});

Route::get('/hello', 'HelloController@index')->name('hello');

Route::middleware([\App\Http\Middleware\OpenContentWhenPasswordCorrect::class])->group(function () {
    Route::get('/login', 'Login@index')->name('login.index');
    Route::post('/login', 'Login@login')->name('login.login');
});

Route::get('/content', 'Content@index')->name('content.index')->middleware(\App\Http\Middleware\OpenLoginWhenPasswordIsNotCorrect::class);

//Route::post('/login/check', 'login@checkPassword')->name('check.password')->middleware('PasswordAuthTask');

/*
Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', 'TasksController@index');
    Route::get('/task/{id}', 'TaskController@show');
});

Route::get('/login', function () {
    return 'Login form';
})->name('login');


Route::post('/login', function (Request $request) {
    $login = $request->get('login');
    $password = $request->get('password');
    /// Isset in database users.
    if (true) {
        \Illuminate\Support\Facades\Auth::loginUsingId(1);
        return redirect(route('hello'));
    }
    return redirect()->back();
})->name('login');
*/
