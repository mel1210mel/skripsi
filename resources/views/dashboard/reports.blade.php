@extends('layouts.app')

@section('content')
<div class="container-report">
    <h1>Laporan Data Barang</h1>

    <div class="actions">
        <a href="{{ route('dashboard.reports.exportPDF') }}" class="btn btn-danger">Export PDF</a>
        <a href="{{ route('dashboard.reports.exportExcel') }}" class="btn btn-success">Export Excel</a>
    </div>

    <table class="table-report">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Berat (kg)</th>
                <th>Harga (Rp)</th>
                <th>Stok Masuk</th>
                <th>Stok Keluar</th>
                <th>Stok Saat Ini</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->weight }}</td>
                <td>{{ number_format($item->price, 0, ',', '.') }}</td>
                <td>{{ $item->stock_in }}</td>
                <td>{{ $item->stock_out }}</td>
                <td>{{ $item->current_stock }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
.container-report {
    max-width: 1000px;
    margin: 40px auto;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 12px rgba(0,0,0,0.1);
}
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}
.actions {
    text-align: right;
    margin-bottom: 10px;
}
.actions .btn {
    padding: 10px 15px;
    margin-left: 10px;
    text-decoration: none;
    border-radius: 5px;
    color: white;
    font-weight: bold;
}
.actions .btn-danger {
    background-color: #e74c3c;
}
.actions .btn-success {
    background-color: #27ae60;
}
.table-report {
    width: 100%;
    border-collapse: collapse;
}
.table-report th, .table-report td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: center;
}
.table-report th {
    background-color: #2980b9;
    color: white;
}
.table-report tbody tr:nth-child(even) {
    background-color: #ecf0f1;
}
</style>
@endsection
