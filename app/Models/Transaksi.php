<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'barangs_id', 'jumlah', 'satuan', 'harga', 'total'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barangs_id');
    }
}
