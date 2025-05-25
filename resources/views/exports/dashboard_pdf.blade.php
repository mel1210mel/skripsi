<h2>Laporan Dashboard</h2>
<p>Tahun: {{ $year }}</p>
<p>Bulan: {{ $month ?? 'Semua' }}</p>

<h3>Stok Masuk</h3>
<table border="1">
    <tr><th>ID</th><th>Item</th><th>Quantity</th><th>Tanggal</th></tr>
    @foreach($stockIn as $in)
    <tr>
        <td>{{ $in->id }}</td>
        <td>{{ $in->item->name }}</td>
        <td>{{ $in->quantity }}</td>
        <td>{{ $in->created_at }}</td>
    </tr>
    @endforeach
</table>

<h3>Stok Keluar</h3>
<table border="1">
    <tr><th>ID</th><th>Item</th><th>Quantity</th><th>Tanggal</th></tr>
    @foreach($stockOut as $out)
    <tr>
        <td>{{ $out->id }}</td>
        <td>{{ $out->item->name }}</td>
        <td>{{ $out->quantity }}</td>
        <td>{{ $out->created_at }}</td>
    </tr>
    @endforeach
</table>
