<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Sesuaikan fillable dengan kolom di tabel items yang dipakai
    protected $fillable = [
        'name',
        'unit',
        'weight',
        'price',
        'stok', // kolom stok yang digunakan
        'sku', // jika kamu pakai SKU, bisa disertakan
    ];

    // Relasi ke StockIn (barang masuk)
    public function stockIns()
    {
        return $this->hasMany(StockIn::class);
    }

    // Relasi ke StockOut (barang keluar)
    public function stockOuts()
    {
        return $this->hasMany(StockOut::class);
    }
}
