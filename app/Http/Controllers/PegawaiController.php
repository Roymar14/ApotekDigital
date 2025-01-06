<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    function pegawai() {

        $data = User::where('role','pegawai')->get();


        return view('admin.pegawai.pegawai',[
            'data' => $data


        ]);
    }

    function dashboard() {
        $listbarang = barang::all();
        $dataBarang = barang::count();
        $dataUser = User::count();
        return view ('pegawai.dashboard', compact('dataUser', 'dataBarang','listbarang'));
    }
}
