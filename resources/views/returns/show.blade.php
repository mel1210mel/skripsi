@extends('layouts.app')
@section('content')
<h2>Detail Retur Barang</h2>
<p><strong>Item:</strong> {{ $productReturn->item->name }}</p>
<p><strong>Jumlah:</strong> {{ $productReturn->quantity }}</p>
<p><strong>Alasan:</strong> {{ $productReturn->reason }}</p>
<p><strong>Tanggal:</strong> {{ $productReturn->return_date }}</p>
<a href="{{ route('returns.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
