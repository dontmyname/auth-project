<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/register', [AuthController::class, 'view_register']);
Route::post('/create_user', [AuthController::class, 'create_user']);

Route::get('/login', [AuthController::class, 'view_login'])->name('login');
Route::post('/login_user', [AuthController::class, 'login_user']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/admin/', function () {
    return view('welcome');
})->middleware('auth');
