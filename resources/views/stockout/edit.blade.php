@extends('layouts.app')

@section('content')
    <h1>Edit Stock Out</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stockout.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Barang:</label>
        <select name="barang_id" required>
            @foreach($barangs as $barang)
                <option value="{{ $barang->id }}" {{ $barang->id == $item->barang_id ? 'selected' : '' }}>
                    {{ $barang->nama }} (Stok: {{ $barang->stok }})
                </option>
            @endforeach
        </select><br><br>

        <label>Supplier:</label>
        <select name="supplier_id" required>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ $supplier->id == $item->supplier_id ? 'selected' : '' }}>
                    {{ $supplier->nama }}
                </option>
            @endforeach
        </select><br><br>

        <label>Jumlah:</label>
        <input type="number" name="jumlah" value="{{ $item->jumlah }}" min="1" required><br><br>

        <label>Tanggal Keluar:</label>
        <input type="date" name="tanggal_keluar" value="{{ $item->tanggal_keluar }}" required><br><br>

        <button type="submit">Update</button>
    </form>
@endsection
