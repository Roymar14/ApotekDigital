<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = New User();
        $user->name = 'coolboys';
        $user->email = 'boy@gmail.com';
        $user->password = Hash::make('admin');
        $user->contact = '0895626266695';
        $user->role = 'Supplier';
        $user->save();
    }
}
