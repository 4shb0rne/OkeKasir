<?php

namespace App\Http\Controllers;

use App\Models\ItemCategories;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\RestockHeader;
use App\Models\RestockDetail;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TransactionController extends Controller
{
    function opentransaction()
    {
        $user = Auth::user()->id;
        $items = Item::query()->where('userid', 'LIKE', $user)->get();
        $itemcategories = ItemCategories::query()->where('userid', 'LIKE', $user)->get();
        return view('transaksi', ['items'=>$items, 'itemcategories'=>$itemcategories]);
    }
    function openaddtransaction()
    {
        // return view('transaksi_save');
        $user = Auth::user()->id;
        $transactions = TransactionHeader::query()->where('status', 'LIKE', 'unpaid')->where('userid', 'LIKE', $user)->get();
        return view('transaksi_header', ['transactions'=>$transactions]);
    }
    function addtransaction(Request $request)
    {
        $datas = $request->all();
        $user = Auth::user()->id;

        $validate = $request->validate([
            'customername' => 'required',
            'staffname' => 'required'
        ]);

        $insert = TransactionHeader::create([
            'userid' => $user,
            'customername'=>$validate['customername'],
            'staffname'=>$validate['staffname'],
            'status'=>"unpaid"
        ]);
        foreach($datas["itemid"] as $index=>$data){
            if($datas["qty"][$index] > 0){
                TransactionDetail::create([
                    'transaction_id'=>$insert->id,
                    'itemid'=>$data,
                    'transactionquantity'=>$datas["qty"][$index]
                ]);
                $item = Item::find($data);
                Item::find($data)->update([
                    'itemquantity'=> $item->itemquantity-$datas["qty"][$index]
                ]);
            }
        }
        return redirect('/cart');
    }

    // masuk ke detail transaction (open transaction detail)
    function openedittransaction($id)
    {
        $user = Auth::user()->id;
        $items = TransactionDetail::query()->where('transaction_id', 'LIKE', $id)->get();
        $itemcategories = ItemCategories::query()->where('userid', 'LIKE', $user)->get();
        return view('transaksi_detail', ['items'=>$items, 'itemcategories'=>$itemcategories]);
    }

    // ini buat view transaction header
    function opentransactionheader()
    {
        $user = Auth::user()->id;
        $transactions = TransactionHeader::query()->where('status', 'LIKE', 'unpaid')->where('userid', 'LIKE', $user)->get();
        $items = TransactionDetail::all();
        return view('transaksi_header', ['transactions'=>$transactions, 'items'=>$items]);
    }
    // hapus transaction header
    function deletetransaction($id)
    {
        $transaction = TransactionHeader::find($id)->delete();
        return redirect('/cart');
    }
    // delete item di transaction detail
    function deleteitem($id, $transactionid)
    {
        $transaction = TransactionDetail::find($id)->delete();
        return redirect('/cart/'.$transactionid);
    }

    // update item di transaction detail
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
    // success transaction
    function addbill(Request $request, $id){
        $datas = $request->all();
        $transaction = TransactionHeader::find($id);
        $transaction->update([
            'status'=>"paid"
        ]);
        return redirect('/penjualan');
    }

    /* HISTORY */
    function openhistory(){
        return view('riwayat');
    }
    function openhistorysale(){
        $transactions = TransactionHeader::query()->where('status', 'LIKE', 'paid')->get();
        $items = TransactionDetail::all();
        return view('h_penjualan', ['transactions'=>$transactions, 'items'=>$items]);
    }

    function openhistorystock(){
        $restocks = RestockHeader::query()->where('status', 'LIKE', 'done')->get();
        $items = RestockDetail::all();
        return view('h_stok', ['restocks'=>$restocks, 'items'=>$items]);
    }

    /* LAPORAN */
    function openlaporan(){
        $transactions = TransactionHeader::query()->where('status', 'LIKE', 'paid')->get();
        $items = TransactionDetail::all();
        return view('laporan', ['transactions'=>$transactions, 'items'=>$items]);
    }
}
