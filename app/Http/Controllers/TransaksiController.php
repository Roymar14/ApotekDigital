<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('barang')->get(); // Mengambil data transaksi beserta relasi dengan barang
        return view('admin.transaksi.transaksi', compact('transaksi'));
    }
    public function create()
    {
        $barang = barang::all(); // Mengambil semua data barang
        return view('admin.transaksi.create', compact('barang'));
    }

    // Fungsi untuk menyimpan transaksi baru
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'barangs_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|integer|min:1',
        ]);

        // Menghitung total
        $total = $request->jumlah * $request->harga;

        // Simpan data transaksi
        Transaksi::create([
            'barangs_id' => $request->barangs_id,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'total' => $total,
        ]);

        // Redirect ke halaman daftar transaksi dengan pesan sukses
        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id); // Mengambil data transaksi berdasarkan ID
        $barang = Barang::all(); // Mengambil semua data barang
        return view('admin.transaksi.edit', compact('transaksi', 'barang'));
    }

    // Fungsi untuk menyimpan perubahan transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'barangs_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|integer|min:1',
        ]);

        // Menghitung total
        $total = $request->jumlah * $request->harga;

        // Mencari transaksi berdasarkan ID dan memperbarui data
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'barangs_id' => $request->barangs_id,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'total' => $total,
        ]);

        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil diperbarui!');
    }
    public function delete($id)
{
    $transaksi = Transaksi::findOrFail($id);
    $transaksi->delete();

    return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil dihapus!');
}
}
