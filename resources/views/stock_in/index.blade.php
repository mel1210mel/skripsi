@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Barang Masuk</h2>
    <a href="{{ route('stock-in.create') }}" class="btn btn-primary mb-3">Tambah Barang Masuk</a>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Supplier</th>
                        <th>Jumlah</th>
                        <th>Tanggal Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stockIns as $stock)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $stock->item->name }}</td>
                        <td>{{ $stock->supplier->name ?? '-' }}</td> {{-- tampilkan nama supplier --}}
                        <td>{{ $stock->quantity }}</td>
                        <td>{{ $stock->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('stock-in.show', $stock->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('stock-in.edit', $stock->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('stock-in.destroy', $stock->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data barang masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
