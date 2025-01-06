<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function users()  {
        $users = User::all();
        return view ('admin.user.users', ['users' => $users]);
    }

    function create()  {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required|string|max:15',
            'password' => 'required', // Validasi password
            'role' => 'required',
            'alamat' => 'required|string',
        ]);
    
        // Hash password sebelum menyimpan
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->contact = $request->contact;
        $data->password = bcrypt($request->password);
        $data->role = $request->role;
        $data->alamat = $request->alamat;

        $data->save();

        // return 'done';
    
        // Redirect ke halaman daftar user atau halaman lain setelah berhasil
        return redirect()->route('users')->with('success', 'User berhasil ditambahkan');
    }

    public function destroy($id)
    {
        // Cari user berdasarkan ID
        $users = User::find($id);
    
        // Jika user tidak ditemukan, kembalikan dengan pesan error
        if (!$users) {
            return redirect()->route('users')->with('error', 'User tidak ditemukan.');
        }
    
        // Hapus user dari database
        $users->delete();
    
        // Kembalikan ke halaman daftar user dengan pesan sukses
        return redirect()->route('users')->with('success', 'User berhasil dihapus.');
    }

    public function edit($id)
{
    $user = User::findOrFail($id); // Ambil data user berdasarkan ID
    return view('admin.user.edit', compact('user')); // Kirim data ke view edit
}

// Menyimpan perubahan data user
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'contact' => 'required|string|max:15',
        'role' => 'required|string|max:255',
        'alamat' => 'required|string',
    ]);

    $user = User::findOrFail($id);
    $user->update($request->all());

    return redirect()->route('users')->with('success', 'User berhasil diperbarui.');
}


    
    
}
