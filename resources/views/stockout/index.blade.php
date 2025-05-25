@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Barang Keluar</h2>
    <a href="{{ route('stockout.create') }}" class="btn btn-primary mb-3">Tambah Barang Keluar</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Supplier</th>
                        <th>Jumlah</th>
                        <th>Tanggal Keluar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stockouts as $stock)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $stock->item->name }}</td>
                        <td>{{ $stock->supplier->name ?? '-' }}</td>
                        <td>{{ $stock->jumlah }}</td>
                        <td>{{ \Carbon\Carbon::parse($stock->tanggal_keluar)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('stockout.show', $stock->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('stockout.edit', $stock->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('stockout.destroy', $stock->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data barang keluar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
