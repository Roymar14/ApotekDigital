<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    function stock() {
        
     $stock = barang::all();
        return view('admin.stock.stock',['barang' => $stock]);
    }
}
