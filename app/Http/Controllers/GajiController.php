<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\User;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    function index()  
    {
        return view('admin.gaji.gaji');
    }
    function gaji()  {
        $gaji = Gaji::get();
        return view('pegawai.gaji',['gaji' => $gaji]);
        
    }
    public function create()
    {
        $users = User::all(); // Ambil semua data user
        return view('pegawai.create', compact('users'));
    }

    // Menyimpan data gaji baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Pastikan user_id valid
            'gaji' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
        ]);

        Gaji::create($request->all()); // Simpan data ke tabel gaji

        return redirect()->route('pegawai.gaji')->with('success', 'Data gaji berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $gaji = Gaji::findOrFail($id); // Temukan data gaji berdasarkan ID
        $users = User::all(); // Ambil semua data user
        return view('pegawai.edit', compact('gaji', 'users'));
    }

    // Memproses update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Validasi relasi user
            'gaji' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
        ]);

        $gaji = Gaji::findOrFail($id); // Temukan data gaji berdasarkan ID
        $gaji->update($request->all()); // Update data gaji

        return redirect()->route('pegawai.gaji')->with('success', 'Data gaji berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $gaji = Gaji::findOrFail($id); // Temukan data gaji berdasarkan ID
        $gaji->delete(); // Hapus data dari database

        return redirect()->route('pegawai.gaji')->with('success', 'Data gaji berhasil dihapus!');
    }
}
