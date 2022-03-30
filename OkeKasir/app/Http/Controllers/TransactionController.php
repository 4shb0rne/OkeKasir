<?php

namespace App\Http\Controllers;

use App\Models\CartTables;
use App\Models\ItemCategories;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
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
        $insert = TransactionHeader::create([
            'customername'=>$request->customername,
            'staffname'=>$request->staffname,
            'status'=>"unpaid"
        ]);
        foreach($datas["itemid"] as $index=>$data){
            if($datas["qty"][$index] > 0){
                TransactionDetail::create([
                    'transaction_id'=>$insert->id,
                    'itemid'=>$data,
                    'transactionquantity'=>$datas["qty"][$index]
                ]);
                
            }
        }
        return redirect('/cart');
    }

    function opencart()
    {
        $carts = TransactionDetail::all();
        return view('transaksi_detail', ['carts'=>$carts]);
    }

    // masuk ke detail transaction (open transaction detail)
    function openedittransaction($id)
    {
        $items = TransactionDetail::query()->where('transaction_id', 'LIKE', $id)->get();
        return view('transaksi_detail', ['items'=>$items]);
    }

    // ini buat view transaction header
    function opentransactionheader()
    {
        $transactions = TransactionHeader::query()->where('status', 'LIKE', 'unpaid')->get();
        return view('transaksi_header', ['transactions'=>$transactions]);
    }
    // hapus transaction header
    function deletetransaction($id)
    {
        $transaction = TransactionHeader::find($id)->delete();
        return redirect('/cart');
    }

    function deleteitem($id, $transactionid)
    {
        $transaction = TransactionDetail::find($id)->delete();
        return redirect('/cart/'.$transactionid);
    }

    // function savecart(Request $request)
    // {
    //     $datas = $request->all();
    //     foreach($datas["itemid"] as $index=>$data){
    //         if($datas["qty"][$index] > 0){
    //             TransactionDetail::create([
    //                 'itemid'=>$data,
    //                 'transactionquantity'=>$datas["qty"][$index],
    //                 'customername'=>$request->customername
    //             ]);
    //         }
    //     }
    //     CartTables::truncate();
    //     return redirect('/transaksi');
    // }
    function updatetransaction(Request $request, $id)
    {
        $datas = $request->all();
        $transaction = TransactionHeader::find($id);
        foreach($datas["itemid"] as $index=>$data){
            if($datas["qty"][$index] > 0){
                $transactiondetail = TransactionDetail::find($datas["id"][$index]);
                $transactiondetail->update([
                    'transaction_id'=>$id,
                    'itemid'=>$data,
                    'transactionquantity'=>$datas["qty"][$index]
                ]);
            }
        }
        return redirect('/cart');
        // return redirect('/cart/'.$id);
    }

    function addbill(Request $request, $id){
        $datas = $request->all();
        $transaction = TransactionHeader::find($id);
        $transaction->update([
            'status'=>"paid"
        ]);
        return redirect('/transaksi');
    }
}
