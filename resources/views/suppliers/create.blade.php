@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Supplier</h2>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
