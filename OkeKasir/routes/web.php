<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('layouts/master');
});


//                                  GET
Route::get('/login', [UserController::class, 'loginpage']);
Route::get('/register', [UserController::class, 'registerpage']);

//Menu
Route::get('/addkategori', [ItemController::class, 'openaddcategory']);
Route::get('/editkategori', [ItemController::class, 'openeditcategory']);
Route::get('/menu', [ItemController::class, 'openmenu']);
Route::get('/addmenu', [ItemController::class, 'openaddmenu']);

//Transaksi
Route::get('/transaksi', [TransactionController::class, 'opentransaction']);


//Restock
Route::get('/restock', [RestockController::class, 'openrestock']);



//                                  POST
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);


//Menu
Route::post('/additemcategory', [ItemController::class, 'additemcategory']);
Route::post('/deleteitemcategory/{id}', [ItemController::class, 'deleteitemcategory']);
Route::post('/addmenu', [ItemController::class, 'additem']);

//Transaksi
