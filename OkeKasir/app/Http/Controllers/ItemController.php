<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategories;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
class ItemController extends Controller
{
    function openaddcategory()
    {
        return view('/addkategori');
    }
    function openeditcategory()
    {
        $itemcategories = ItemCategories::all();
        return view('/editkategori', ['itemcategories'=>$itemcategories]);
    }
    function deleteitemcategory($id)
    {
        $itemcategory = ItemCategories::find($id)->delete();
        return redirect('/editkategori');
    }
    function openmenu()
    {
        $items = Item::all();
        $itemcategories = ItemCategories::all();
        return view('/menu', ['items'=>$items, 'itemcategories'=>$itemcategories]);
    }
    function openaddmenu()
    {
        $itemcategories = ItemCategories::all();
        return view('/addmenu', ['itemcategories'=>$itemcategories]);
    }

    function additem(Request $request)
    {
        $validate = $request->validate([
            'nama_produk' => 'required|string',
            'deskripsi' => 'required|string',
            'netto' => 'required|integer',
            'bruto' => 'required|integer',
            'categoryid' => 'required',
            'qty' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,jpg,png,svg'
        ]);
        $item = new Item();
        $item->itemcategoryid =  $validate['categoryid'];
        $item->itemname = $validate['nama_produk'];
        $item->itemdescription = $validate['deskripsi'];
        $item->brutoprice = $validate['bruto'];
        $item->nettoprice = $validate['netto'];
        $item->itemquantity = $validate['qty'];
        $item->itempicture = $validate['image'];
        $file = $request->file('image');
        $originalname = $file->getClientOriginalName();
        $path = $file->storeAs('public/Assets/', $originalname);
        $item->save();
        return redirect('/menu');
    }
    
    function additemcategory(Request $request)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required'
        ]);
        $itemcategory = new ItemCategories();
        $itemcategory->itemcategoryname = $validate['nama_kategori'];
        $itemcategory->save();
        return redirect('/menu');
    }
    function openedititem($id)
    {
        $item = Item::find($id);
        $itemcategories = ItemCategories::all();
        return view('editmenu', ['item'=>$item, 'itemcategories'=>$itemcategories]);
    }

    function edititem(Request $request,$id)
    {
        $datas = $request->all();
        $items = Item::where('id',"=",$id)->update([
            'itemname' => $request->nama_produk,
            'itemdescription' => $request->deskripsi,
        ]);
        return redirect('/menu');
    }
    function deleteitem($id)
    {
        $item = Item::find($id)->delete();
        return redirect('/menu');
    }

    function searchitem(Request $request)
    {
        $items = Item::query();
        if($request->search)
        {
            $items = $items->where('itemname', 'like', '%'.$request->search.'%')->orwherehas('item_categories', function(Builder $query) use($request){
                $query->where('itemcategoryname', 'like', '%'.$request->search.'%');
            })->get();
        } else{
            $items = Item::all();
        }
        $itemcategories = ItemCategories::all();
        return view('/menu', ['items'=>$items, 'itemcategories'=>$itemcategories]);
    }
}
