<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    function supplier() {
        $data = User::where('role', 'supplier')->get();
        return view('admin.supplier.supplier',['data' => $data]);
    }
    function dashboard() {
        $listbarang = barang::all();
        $dataBarang = barang::count();
        $dataUser = User::count();
        return view ('supplier.dashboard', compact('dataUser', 'dataBarang','listbarang'));
    }

    function stock() {
        
        $stock = barang::all();
           return view('supplier.stock.index',['barang' => $stock]);
       }
       public function create()
       {
           return view('supplier.stock.create');
       }
       public function store(Request $request)
       {
            // Validasi data
            $validatedData = $request->validate([
               'name' => 'required|string|max:255',
               'kandungan' => 'required|string|max:255',
               'stock' => 'required|integer|min:0',
               'price' => 'required|numeric|min:0',
           ]);
   
           // Simpan data ke database
           Barang::create($validatedData);
   
           // Redirect dengan pesan sukses
           return redirect()->route('stock')->with('success', 'Barang berhasil ditambahkan.');
       }
       function destroy($id) 
        {
           $stock = barang::findOrFail($id);
   
           if (!$stock) {
               return redirect()->route('stock')->with('error', 'User tidak ditemukan.');
           }
           $stock->delete();
           return redirect()->route('stock')->with('success', 'User berhasil dihapus.');
   
       }
       public function edit($id)
   {
       $barang = Barang::findOrFail($id);
       return view('admin.stock.edit', compact('barang'));
   }
   
   public function update(Request $request, $id)
   {
       // Validasi data
       $validatedData = $request->validate([
           'name' => 'required|string|max:255',
           'kandungan' => 'required|string|max:255',
           'stock' => 'required|integer|min:0',
           'price' => 'required|numeric|min:0',
       ]);
   
       // Cari barang berdasarkan ID dan update
       $barang = Barang::findOrFail($id);
       $barang->update($validatedData);
   
       // Redirect ke daftar barang dengan pesan sukses
       return redirect()->route('stock')->with('success', 'Barang berhasil diperbarui.');
   }
}
