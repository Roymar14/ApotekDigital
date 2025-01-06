<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\BarangMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BarangController extends Controller
{
    function barang() {
       $barangMasuk = BarangMasuk::get();
        return view('admin.barang.index',['barangMasuk' => $barangMasuk]);
    }
    public function create()
    {
        return view('admin.stock.create');
    }

    public function store(Request $request)
    {
         // Validasi data
         $validatedData = $request->validate([
            'barang' => 'required|string|max:255',
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
        'barang' => 'required|string|max:255',
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
function createbarangMasuk()  {
    $user = User::get();

    return view('admin.barang.create',['user' => $user]);
}
public function storebarangMasuk(Request $request)
{
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'kandungan' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'jumlah' => 'required|numeric|min:1',
        'price' => 'required|numeric|min:1',
    ]);

    // Menyimpan data ke dalam database
    BarangMasuk::create([
        'user_id' => $request->user_id,
        'kandungan' => $request->kandungan,
        'nama' => $request->nama,
        'jumlah' => $request->jumlah,
        'price' => $request->price,
    ]);

    return redirect()->route('barang')->with('success', 'Barang masuk berhasil ditambahkan.');
}


public function editbarangMasuk($id)
{
    $barang = BarangMasuk::findOrFail($id);
    $suppliers = User::where('role', 'supplier')->get(); // Ambil data supplier
    return view('admin.barang.edit', compact('barang', 'suppliers'));
}

public function updatebarangMasuk(Request $request, $id)
{
    $request->validate([
        'supplier_id' => 'required|exists:users,id',
        'nama' => 'required|string|max:255',
        'kandungan' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
    ]);

    $barang = BarangMasuk::findOrFail($id);
    $barang->update([
        'supplier_id' => $request->supplier_id,
        'nama' => $request->nama,
        'kandungan' => $request->kandungan,
        'jumlah' => $request->jumlah,
        'price' => $request->price,
    ]);

    return redirect()->route('barang')->with('success', 'Data barang berhasil diperbarui.');
}


public function destroybarangMasuk($id)
{
    $barang = BarangMasuk::findOrFail($id);
    $barang->delete();

    return redirect()->route('barang')->with('success', 'Data barang berhasil dihapus.');
}


}