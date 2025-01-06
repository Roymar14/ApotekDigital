<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = New User();
        $user->name = 'pegawai';
        $user->email = 'pegawai@gmail.com';
        $user->password = Hash::make('admin');
        $user->contact = '0895626266695';
        $user->role = 'Pegawai';
        $user->save();
    }
}
