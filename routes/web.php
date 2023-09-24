<?php

use app\Http\Controllers\login;
use App\Http\Middleware;
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

Route::get('/login', 'login@show')->name('login');
Route::post('/login', 'login@checkPass')->name('check.pass')->middleware(PasswordAuthTask::class);
Route::get('/noaccess', 'login@checkPass')->name('noaccess')->middleware(PasswordAuthTask::class);

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
