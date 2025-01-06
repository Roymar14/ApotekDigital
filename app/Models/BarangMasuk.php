<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';
    use HasFactory;
    protected $fillable = [
        'nama',
        'kandungan',
        'jumlah',
        'price',
        'user_id'
    ];

    function user()  {
        return $this->belongsTo(User::class);
    }
}
