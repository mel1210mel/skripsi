@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Retur Barang</h2>
    <a href="{{ route('returns.create') }}" class="btn btn-primary mb-3">Tambah Retur Barang</a>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Reason</th>
                        <th>Return Date</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($returns as $return)
                    <tr>
                        <td>{{ $return->id }}</td>
                        <td>{{ $return->item->name }}</td>
                        <td>{{ $return->quantity }}</td>
                        <td>{{ $return->reason }}</td>
                        <td>{{ $return->return_date }}</td>
                        <td>
                            <a href="{{ route('returns.show', $return->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('returns.edit', $return->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('returns.destroy', $return->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data retur barang.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
