@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Barang Masuk</h2>

    {{-- tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stock-in.store') }}" method="POST">
        @csrf

        {{-- NAMA BARANG --}}
        <div class="mb-3">
            <label for="item_id" class="form-label">Nama Barang</label>
            <select name="item_id" id="item_id" class="form-select" required>
                <option value="">— Pilih Barang —</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- SUPPLIER --}}
        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-select" required>
                <option value="">— Pilih Supplier —</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- JUMLAH --}}
        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number"
                   name="quantity"
                   id="quantity"
                   class="form-control"
                   min="1"
                   value="{{ old('quantity') }}"
                   required>
        </div>

        {{-- TANGGAL MASUK --}}
        <div class="mb-3">
            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date"
                   name="tanggal_masuk"
                   id="tanggal_masuk"
                   class="form-control"
                   value="{{ old('tanggal_masuk', now()->toDateString()) }}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('stock-in.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
