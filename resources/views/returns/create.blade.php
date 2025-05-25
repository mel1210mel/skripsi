@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Retur Barang</h2>
    <div class="card shadow-sm p-4">
        <form method="POST" action="{{ route('returns.store') }}">
            @csrf
            <div class="mb-3">
                <label for="item_id" class="form-label fw-bold">Item Barang</label>
                <select name="item_id" class="form-select @error('item_id') is-invalid @enderror" required>
                    <option value="">Pilih Jenis Barang</option>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('item_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="quantity" class="form-label fw-bold">Quantity</label>
                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" required min="1" placeholder="Masukkan jumlah barang yang dikembalikan">
                @error('quantity')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="reason" class="form-label fw-bold">Alasan Retur</label>
                <textarea name="reason" class="form-control @error('reason') is-invalid @enderror" rows="3" placeholder="Jelaskan alasan pengembalian barang"></textarea>
                @error('reason')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="return_date" class="form-label fw-bold">Tanggal Retur</label>
                <input type="date" name="return_date" class="form-control @error('return_date') is-invalid @enderror" required>
                @error('return_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('returns.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Retur Barang</button>
            </div>
        </form>
    </div>
</div>
@endsection
