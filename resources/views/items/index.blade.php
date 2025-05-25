@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Barang</h2>
    <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Berat</th>
                        <th>Harga</th>
                        <th>Stok Masuk</th>
                        <th>Stok Keluar</th>
                        <th>Stok Saat Ini</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->unit }}</td>
                        <td>{{ $item->weight }} kg</td>
                        <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>{{ $item->stock_in }}</td>
                        <td>{{ $item->stock_out }}</td>
                        <td>{{ $item->current_stock }}</td>
                        <td>
                            <a href="{{ route('items.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data barang tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
