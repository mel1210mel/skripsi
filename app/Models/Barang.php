<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang'; // Pastikan nama tabel benar
    protected $fillable = ['nama_barang', 'kategori', 'harga', 'stok'];
}
