<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategories;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    function openaddcategory()
    {
        return view('/addkategori');
    }
    function openeditcategory()
    {
        $user = Auth::user()->id;
        $itemcategories = ItemCategories::query()->where('userid', 'LIKE', $user)->get();
        return view('/editkategori', ['itemcategories' => $itemcategories]);
    }
    function deleteitemcategory($id)
    {
        $itemcategory = ItemCategories::find($id)->delete();
        return redirect('/editkategori');
    }
    function openmenu()
    {
        $user = Auth::user()->id;
        $items = Item::query()->where('userid', 'LIKE', $user)->get();
        $itemcategories = ItemCategories::query()->where('userid', 'LIKE', $user)->get();
        return view('/menu', ['items' => $items, 'itemcategories' => $itemcategories]);
    }
    function openaddmenu()
    {
        $user = Auth::user()->id;
        $itemcategories = ItemCategories::query()->where('userid', 'LIKE', $user)->get();
        return view('/addmenu', ['itemcategories' => $itemcategories]);
    }

    function additem(Request $request)
    {
        $user = Auth::user()->id;
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
        $item->userid = $user;
        $item->itemcategoryid =  $validate['categoryid'];
        $item->itemname = $validate['nama_produk'];
        $item->itemdescription = $validate['deskripsi'];
        $item->brutoprice = $validate['bruto'];
        $item->nettoprice = $validate['netto'];
        $item->itemquantity = $validate['qty'];
        $file = $request->file('image');
        $originalname = $file->getClientOriginalName();
        $path = $file->storeAs('public/Assets/', $originalname);
        $item->itempicture = $originalname;
        $item->save();
        return redirect('/menu');
    }

    function additemcategory(Request $request)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required'
        ]);
        $itemcategory = new ItemCategories();
        $itemcategory->userid = Auth::user()->id;
        $itemcategory->itemcategoryname = $validate['nama_kategori'];
        $itemcategory->save();
        return redirect('/menu');
    }
    function openedititem($id)
    {
        $user = Auth::user()->id;
        $item = Item::find($id);
        $itemcategories = ItemCategories::query()->where('userid', 'LIKE', $user)->get();
        return view('editmenu', ['item' => $item, 'itemcategories' => $itemcategories]);
    }

    function edititem(Request $request, $id)
    {
        $datas = $request->all();
        $items = Item::where('id', "=", $id)->update([
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
        $user = Auth::user()->id;
        $items = Item::query();
        if ($request->search) {
            $items = $items->where('itemname', 'LIKE', '%' . $request->search . '%')->orWhere('userid', 'LIKE', $user)
                ->orwherehas('item_categories', function (Builder $query) use ($request) {
                    $query->where('itemcategoryname', 'LIKE', '%' . $request->search . '%');
                })->get();
        } else {
            $items = Item::all();
        }
        $itemcategories = ItemCategories::query()->where('userid', 'LIKE', $user)->get();
        return view('/menu', ['items' => $items, 'itemcategories' => $itemcategories]);
    }

    public function filtercategories(Request $request)
    {
        $item = Item::query()->with("item_categories");
        $itemcategories = ItemCategories::all();
        $user = Auth::user()->id;
        if ($request->ajax() && $request->category == 'Kategori') {
            return response()->json(['items' => $item->where('userid', $user)->get()]);
        }
        if ($request->ajax() && $request->category != null) {
            return response()->json(['items' => $item->where('itemcategoryid', $request->category)->get()]);
        }


        return view('/menu', [
            'items' => $item->get(), 'itemcategories' => $itemcategories
        ]);
    }
}
