<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', [UserController::class, 'index']);


    Route::get('/edit_user', [UserController::class, 'show']);

    Route::post('/update_user', [UserController::class, 'update_user']);

    Route::get('/products', [ProductController::class, 'index']);

    Route::post('/products/create', [ProductController::class, 'store']);   

    Route::get('/my_products', [ProductController::class, 'my_products']);

    Route::get('/delete_product/{id}',[ProductController::class,'delete_product']);


Route::get('/edit_product/{id}', [ProductController::class, 'view_edit_product']);

Route::post('/update_product/{id}', [ProductController::class, 'update_product']);


});
