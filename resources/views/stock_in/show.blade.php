@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detail Barang Masuk</h2>
    <div class="card p-4">
        <h4>Nama Barang: {{ $stockIn->item->name }}</h4>
        <p><strong>Jumlah:</strong> {{ $stockIn->quantity }}</p>
        <p><strong>Tanggal Masuk:</strong> {{ $stockIn->date }}</p>
        <a href="{{ route('stock_in.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
