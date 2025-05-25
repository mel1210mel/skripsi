@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Barang Keluar</h2>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('stockout.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="item_id" class="form-label">Barang:</label>
                    <select name="item_id" class="form-select" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} (Stok: {{ $item->stok }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="supplier_id" class="form-label">Supplier:</label>
                    <select name="supplier_id" class="form-select" required>
                        <option value="">-- Pilih Supplier --</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah:</label>
                    <input type="number" name="jumlah" class="form-control" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_keluar" class="form-label">Tanggal Keluar:</label>
                    <input type="date" name="tanggal_keluar" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('stockout.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
