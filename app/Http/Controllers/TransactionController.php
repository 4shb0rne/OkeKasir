<?php

namespace App\Http\Controllers;

use App\Models\CartTables;
use App\Models\ItemCategories;
use App\Models\TransactionDetail;
use App\Models\Item;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    function opentransaction()
    {
        $items = Item::all();
        $itemcategories = ItemCategories::all();
        return view('transaksi', ['items'=>$items, 'itemcategories'=>$itemcategories]);
    }
    function openaddtransaction()
    {
        return view('transaksi_save');
    }

    function addtransaction(Request $request)
    {
        $datas = $request->all();
        foreach($datas["itemid"] as $index=>$data){
            if($datas["qty"][$index] > 0){
                CartTables::create([
                    'itemid'=>$data,
                    'quantity'=>$datas["qty"][$index],
                    'customername'=>"customer"
                ]);
            }
        }
        return redirect('/cart');
    }
    function deletetransaction($id)
    {
        $transaction = TransactionDetail::find($id)->delete();
        return redirect('/addtransaksi');
    }
    function opencart()
    {
        $carts = CartTables::all();
        return view('transaksi_cart', ['carts'=>$carts]);
    }
    function savecart(Request $request)
    {
        $datas = $request->all();
        foreach($datas["itemid"] as $index=>$data){
            if($datas["qty"][$index] > 0){
                TransactionDetail::create([
                    'itemid'=>$data,
                    'transactionquantity'=>$datas["qty"][$index],
                    'customername'=>$request->customername
                ]);
            }
        }
        CartTables::truncate();
        return redirect('/transaksi');
    }
}
