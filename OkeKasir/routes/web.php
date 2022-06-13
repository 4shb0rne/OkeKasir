<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\RestockController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ScheduleController;
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
    return view('index');
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
    Route::get('/filtercategory', [ItemController::class, 'filtercategories']);

    //Transaksi
    Route::get('/transaksi', [TransactionController::class, 'opentransaction']);
    Route::get('/addtransaksi', [TransactionController::class, 'openaddtransaction']);

    //Restock
    Route::get('/restock', [RestockController::class, 'openrestock']);
    Route::get('/addrestock/{id}', [RestockController::class, 'openaddrestock']);
    Route::get('/addbillrestock/{id}', [RestockController::class, 'openaddbillrestock']);

    //Cart
    Route::get('/cart', [TransactionController::class, 'opentransactionheader']);
    Route::get('/cart/{id}', [TransactionController::class, 'openedittransaction']);
    
    // History
    Route::get('/riwayat', [TransactionController::class, 'openhistory']);
    Route::get('/penjualan', [TransactionController::class, 'openhistorysale']);
    Route::get('/stok', [TransactionController::class, 'openhistorystock']);

    // Laporan
    Route::get('/laporan', [TransactionController::class, 'openlaporan']);

    // Catatan
    Route::get('/catatan', [ScheduleController::class, 'opencatatan']);
    Route::get('/addcatatan', [ScheduleController::class, 'openaddcatatan']);
    Route::get('/editcatatan/{id}', [ScheduleController::class, 'openeditcatatan']);
    
    //                                  POST
    //Menu
    Route::post('/additemcategory', [ItemController::class, 'additemcategory']);
    Route::post('/deleteitemcategory/{id}', [ItemController::class, 'deleteitemcategory']);
    Route::post('/addmenu', [ItemController::class, 'additem']);
    Route::post('/deleteitem/{id}', [ItemController::class, 'deleteitem']);
    Route::post('/edititem/{id}', [ItemController::class, 'edititem']);
    Route::post('/searchitem', [ItemController::class, 'searchitem']);
    
    //Transaksi
    Route::post('/addtransaksi', [TransactionController::class, 'addtransaction']);
    Route::post('/deleteitem/{id}/{transactionid}', [TransactionController::class, 'deleteitem']);
    Route::post('/updatetransaction/{id}', [TransactionController::class, 'updatetransaction']);
    Route::post('/addbill/{id}', [TransactionController::class, 'addbill']);

    //Restock
    Route::post('/addrestock/{id}', [RestockController::class, 'addrestock']);
    Route::post('/addbillrestock', [RestockController::class, 'addbillrestock']);
    Route::post('/deleterestockitem/{id}/{restockid}', [RestockController::class, 'deleterestockitem']);
    Route::post('/saverestock/{id}', [RestockController::class, 'saverestock']);
    Route::post('/deleterestock/{id}', [RestockController::class, 'deleterestock']);

    // Catatan
    Route::post('/addcatatan', [ScheduleController::class, 'addcatatan']);
    Route::post('/deleteschedule/{id}', [ScheduleController::class, 'deleteschedule']);
    Route::post('/editcatatan/{id}', [ScheduleController::class, 'editcatatan']);

    //Cart
    Route::get('/savecart', [TransactionController::class, 'savecart']);
    Route::post('/deletetransaction/{id}', [TransactionController::class, 'deletetransaction']);
});









