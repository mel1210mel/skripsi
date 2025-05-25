<table>
    <thead>
        <tr>
            <th colspan="4" style="font-size: 18px; font-weight: bold;">Laporan Dashboard</th>
        </tr>
        <tr>
            <th colspan="4">Tahun: {{ $year }} | Bulan: {{ $month ?? 'Semua' }}</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <tr><td colspan="4" style="font-weight: bold;">Stok Masuk</td></tr>
        @foreach($stockIn as $in)
        <tr>
            <td>{{ $in->id }}</td>
            <td>{{ $in->item->name }}</td>
            <td>{{ $in->quantity }}</td>
            <td>{{ $in->created_at }}</td>
        </tr>
        @endforeach

        <tr><td colspan="4" style="font-weight: bold;">Stok Keluar</td></tr>
        @foreach($stockOut as $out)
        <tr>
            <td>{{ $out->id }}</td>
            <td>{{ $out->item->name }}</td>
            <td>{{ $out->quantity }}</td>
            <td>{{ $out->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
