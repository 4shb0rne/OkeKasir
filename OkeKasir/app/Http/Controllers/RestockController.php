<?php

namespace App\Http\Controllers;

use App\Models\RestockHeader;
use Illuminate\Http\Request;

class RestockController extends Controller
{
    function openrestock()
    {
        $restocks = RestockHeader::all();
        return view('restock');
    }
}
