<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'supplier_id',
        'jumlah',
        'tanggal_keluar',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
