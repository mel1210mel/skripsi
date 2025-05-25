@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Supplier</h2>
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $supplier->name }}" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="address" class="form-control" value="{{ $supplier->address }}">
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="phone" class="form-control" value="{{ $supplier->phone }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
