@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Barang</h2>

    {{-- Validasi error --}}
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
            <form action="{{ route('items.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Barang:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $item->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="unit" class="form-label">Satuan:</label>
                    <input type="text" name="unit" class="form-control" value="{{ old('unit', $item->unit) }}" required>
                </div>

                <div class="mb-3">
                    <label for="weight" class="form-label">Berat (gram):</label>
                    <input type="number" name="weight" class="form-control" value="{{ old('weight', $item->weight) }}" required step="0.01" min="0">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga (Rp):</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $item->price) }}" required step="100" min="0">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('items.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
