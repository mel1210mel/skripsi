<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\BarangRetur;

class ReportController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $stokBarang = [];

        foreach ($barangs as $barang) {
            $totalMasuk = BarangMasuk::where('barang_id', $barang->id)->sum('jumlah');
            $totalKeluar = BarangKeluar::where('barang_id', $barang->id)->sum('jumlah');
            $totalRetur = BarangRetur::where('barang_id', $barang->id)->sum('jumlah');

            $stokAkhir = $totalMasuk - $totalKeluar + $totalRetur;

            $stokBarang[] = [
                'nama_barang' => $barang->nama_barang,
                'kategori' => $barang->kategori,
                'harga' => $barang->harga,
                'stok' => $stokAkhir,
            ];
        }

        return view('laporan.index', compact('stokBarang'));
    }
}
