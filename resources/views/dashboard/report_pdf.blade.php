<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        table th {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Laporan Data Barang</h2>
    <table>
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
</body>
</html>
