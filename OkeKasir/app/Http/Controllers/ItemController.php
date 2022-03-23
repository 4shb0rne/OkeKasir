<?php

namespace App\Http\Controllers;

use App\Models\Item_Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    function openitemcategory()
    {
        return view('/addkategori');
    }
    function additemcategory(Request $request)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required'
        ]);
        $itemcategory = new Item_Category();
        $itemcategory->itemcategoryname = $validate['nama_kategori'];
        $itemcategory->save();
        return redirect('/');
    }
}
