@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Laporan Stok Barang</h1>

    <table class="table table-striped table-bordered table-hover shadow-sm">
        <thead class="table-primary">
            <tr>
                <th class="text-center">No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th class="text-right">Harga (Rp)</th>
                <th class="text-center">Stok Akhir</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stokBarang as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item['nama_barang'] }}</td>
                    <td>{{ $item['kategori'] }}</td>
                    <td class="text-right">{{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td class="text-center">{{ $item['stok'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Data barang tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
