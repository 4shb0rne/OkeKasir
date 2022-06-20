<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\RestockHeader;
use App\Models\RestockDetail;
use App\Models\Item;
use App\Models\ItemCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RestockController extends Controller
{
    function openrestock()
    {
        // $restocks = DB::table('restock_headers')
        //             ->join('restock_details','restock_headers.id','=','restock_id')
        //             ->join('items','restock_details.itemid','=','id')
        //             ->select('restock_headers.staffname as headers', 'restock_details.* as details', 'items.itemname as items');     
        // return view('restock',['restocks'=>$restocks]);
        $user = Auth::user()->id;
        $restocks = RestockHeader::query()->where('status', 'LIKE', 'undone')
        ->where('userid', 'LIKE', $user)->get();
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
        $validate = $request->validate([
            'staffname'=>'required'
        ]);
        $user = Auth::user()->id;
        $insert = RestockHeader::create([
            'staffname'=>$validate['staffname'],
            'status'=>"undone",
            'userid'=>$user
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
        $restock->restock_id = $id;
        $restock->save();
        return redirect('/addrestock/'.$id);
    }
    // success restock
    function saverestock(Request $request, $id){
        $restocks = RestockHeader::find($id);
        $items = DB::table('restock_details')->join('items', 'restock_details.itemid', '=', 'items.id')
        ->where('restock_id', 'LIKE', $id)->get();
        $restocks->update([
            'status'=>"done"
        ]);
        foreach($items as $item){
            $it = Item::find($item->itemid);
            $it->update([
                'itemquantity' => $item->restockquantity+$it->itemquantity
            ]);
        }
        return redirect('/stok');
    }

    function deleterestockitem($id, $restock_id)
    {
        $transaction = RestockDetail::find($id)->delete();
        return redirect('/addrestock/'.$restock_id);
    }

    // hapus restock header
    function deleterestock($id)
    {
        $restock = RestockHeader::find($id)->delete();
        return redirect('/restock');
    }
}
