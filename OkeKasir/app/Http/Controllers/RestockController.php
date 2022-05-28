<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\RestockHeader;
use App\Models\RestockDetail;
use App\Models\ItemCategories;
use Illuminate\Http\Request;

class RestockController extends Controller
{
    function openrestock()
    {
        // $restocks = DB::table('restock_headers')
        //             ->join('restock_details','restock_headers.id','=','restock_id')
        //             ->join('items','restock_details.itemid','=','id')
        //             ->select('restock_headers.staffname as headers', 'restock_details.* as details', 'items.itemname as items');     
        // return view('restock',['restocks'=>$restocks]);
        $restocks = RestockHeader::query()->where('status', 'LIKE', 'undone')->get();
        $items = RestockDetail::all();
        return view('restock', ['restocks'=>$restocks, 'items'=>$items]);
    }
    function openaddbillrestock($id){
        $restocks = RestockHeader::find($id);
        $items = RestockDetail::query()->where('restock_id', 'LIKE', $id)->get();
        $itemcategories = ItemCategories::all();
        return view('restock_detail', ['restocks'=>$restocks, 'items'=>$items, 'itemcategories'=>$itemcategories]);
    }
    function addbillrestock(Request $request){
        $datas = $request->all();
        $insert = RestockHeader::create([
            'staffname'=>$request->staffname,
            'status'=>"undone"
        ]);
        return redirect('/addbillrestock/'.$insert->id);
    }

    function openaddrestock($id)
    {   
        $restocks = RestockHeader::find($id);
        $items = RestockDetail::query()->where('restock_id', 'LIKE', $id)->get();
        $itemcategories = ItemCategories::all();       
        return view('restock_detail', ['restocks'=>$restocks, 'items'=>$items, 'itemcategories'=>$itemcategories]);
    }
    function addrestock(Request $request,$id)
    {
        $validate = $request->validate([
            'id_produk' => 'required|integer',
            'qty' => 'required|integer'
        ]);
        $restock = new RestockDetail();
        $restock->itemid = $validate['id_produk'];
        $restock->restockquantity = $validate['qty'];
        // + qty ke item
        $restock->restock_id = $id;
       
        $restock->save();
        return redirect('/addrestock/'.$id);
    }
    // success restock
    function saverestock(Request $request, $id){
        $datas = $request->all();
        $restocks = RestockHeader::find($id);
        $restocks->update([
            'status'=>"done"
        ]);
        return redirect('/stok');
    }

    function deleterestockitem($id, $restock_id)
    {
        $transaction = RestockDetail::find($id)->delete();
        // - qty di item
        return redirect('/addrestock/'.$restock_id);
    }

    // hapus restock header
    function deleterestock($id)
    {
        $restock = RestockHeader::find($id)->delete();
        return redirect('/restock');
    }
}
