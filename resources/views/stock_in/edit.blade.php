@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Barang Masuk</h2>

    <form action="{{ route('stock_in.update', $stockIn->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="item" class="form-label">Nama Barang</label>
            <select name="item_id" class="form-select" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" {{ $stockIn->item_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" name="quantity" class="form-control" value="{{ $stockIn->quantity }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Masuk</label>
            <input type="date" name="date" class="form-control" value="{{ $stockIn->date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('stock_in.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
