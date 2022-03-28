<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\RestockController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\TransactionDetail;

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
Route::get('/login', [UserController::class, 'loginpage']);
Route::get('/register', [UserController::class, 'registerpage']);

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::group(['middleware' => 'auth'], function (){
    Route::get('/logout', [UserController::class, 'logout']);
    //                                  GET
    //Menu
    Route::get('/addkategori', [ItemController::class, 'openaddcategory']);
    Route::get('/editkategori', [ItemController::class, 'openeditcategory']);
    Route::get('/menu', [ItemController::class, 'openmenu']);
    Route::get('/addmenu', [ItemController::class, 'openaddmenu']);
    Route::get('/edititem/{id}', [ItemController::class, 'openedititem']);

    //Transaksi
    Route::get('/transaksi', [TransactionController::class, 'opentransaction']);
    Route::get('/addtransaksi', [TransactionController::class, 'openaddtransaction']);

    //Restock
    Route::get('/restock', [RestockController::class, 'openrestock']);

    //Cart
    Route::get('/cart', [TransactionController::class, 'opencart']);
    

    //                                  POST
    //Menu
    Route::post('/additemcategory', [ItemController::class, 'additemcategory']);
    Route::post('/deleteitemcategory/{id}', [ItemController::class, 'deleteitemcategory']);
    Route::post('/addmenu', [ItemController::class, 'additem']);
    Route::post('/deleteitem/{id}', [ItemController::class, 'deleteitem']);
    Route::post('/addtransaksi', [TransactionController::class, 'addtransaction']);
    
    //Transaksi


    //Restock

    //Cart
    Route::post('/savecart', [TransactionController::class, 'savecart']);
});









