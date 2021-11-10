<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\TheaterController;

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


//RUTAS USER
Route::get('/users', [UserController::class, 'index']);
Route::post('/userSearch', [UserController::class, 'show']);
Route::post('/userStore', [UserController::class, 'store']);
Route::post('/userUpdate', [UserController::class, 'update']);
Route::post('/userDelete', [UserController::class, 'destroy']);

//RUTAS SALE
Route::get('/sales', [SaleController::class, 'index']);
Route::post('/saleSearch', [SaleController::class, 'show']);
Route::post('/saleStore', [SaleController::class, 'store']);

//RUTAS MOVIE
Route::get('/movies', [MovieController::class, 'index']);
Route::post('/movieSearch', [MovieController::class, 'show']);
Route::post('/movieStore', [MovieController::class, 'store']);
Route::post('/movieUpdate', [MovieController::class, 'update']);
Route::post('/movieDestroy', [MovieController::class, 'destroy']);

//RUTAS SHOW
Route::post('/showSearch', [ShowController::class, 'show']);
Route::post('/showStore', [ShowController::class, 'store']);
Route::post('/showUpdate', [ShowController::class, 'update']);
Route::post('/showDestroy', [ShowController::class, 'destroy']);

//RUTAS CINEMA
Route::get('/cinemas', [CinemaController::class, 'index']);
Route::post('/cinemaStore', [CinemaController::class, 'store']);

//RUTAS THEATER
Route::get('/theaters', [TheaterController::class, 'index']);
Route::post('/theaterStore', [TheaterController::class, 'store']);

//TOKEN PARA POSTMAN
Route::get('/userToken', [UserController::class, 'showToken']);
Route::get('/saleToken', [SaleController::class, 'showToken']);
Route::get('/movieToken', [MovieController::class, 'showToken']);
Route::get('/showToken', [ShowController::class, 'showToken']);
Route::get('/cinemaToken', [CinemaController::class, 'showToken']);
Route::get('/theaterToken', [TheaterController::class, 'showToken']);