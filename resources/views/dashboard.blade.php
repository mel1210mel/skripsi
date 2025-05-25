@extends('layouts.app')
@section('content')
<h2 class="mb-4">Dashboard</h2>
<form method="GET" action="{{ route('dashboard') }}" class="mb-4">
    <div class="row">
        <div class="col-md-3">
            <select name="year" class="form-select" onchange="this.form.submit()">
                @for($i = date('Y'); $i >= 2020; $i--)
                    <option value="{{ $i }}" {{ request('year', date('Y')) == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="col-md-3">
            <select name="month" class="form-select" onchange="this.form.submit()">
                @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $month)
                    <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>{{ $month }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('dashboard.export.pdf') }}?year={{ request('year') }}&month={{ request('month') }}" class="btn btn-danger">Export PDF</a>
            <a href="{{ route('dashboard.export.excel') }}?year={{ request('year') }}&month={{ request('month') }}" class="btn btn-success">Export Excel</a>
        </div>
    </div>
</form>

<div class="row mb-4">
    <div class="col-md-3"><div class="card text-center p-3"><h6>Total Barang</h6><h3 class="text-danger">{{ $totalItems }}</h3></div></div>
    <div class="col-md-3"><div class="card text-center p-3"><h6>Barang Masuk</h6><h3 class="text-success">{{ $totalStockIn }}</h3></div></div>
    <div class="col-md-3"><div class="card text-center p-3"><h6>Barang Keluar</h6><h3 class="text-primary">{{ $totalStockOut }}</h3></div></div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <canvas id="revenueChart"></canvas>
    </div>
    <div class="col-md-6">
        <canvas id="emailChart"></canvas>
    </div>
</div>

<script>
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const emailCtx = document.getElementById('emailChart').getContext('2d');

    new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: @json($revenueMonths),
            datasets: [{
                label: 'Revenue',
                data: @json($revenueData),
                backgroundColor: '#4e73df'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    new Chart(emailCtx, {
        type: 'line',
        data: {
            labels: @json($emailMonths),
            datasets: [{
                label: 'Emails Sent',
                data: @json($emailData),
                borderColor: '#1cc88a',
                backgroundColor: 'rgba(28,200,138,0.2)',
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>

<script>
const revenueCtx = document.getElementById('revenueChart').getContext('2d');
const emailCtx = document.getElementById('emailChart').getContext('2d');

new Chart(revenueCtx, {
    type: 'bar',
    data: { labels: @json($revenueMonths), datasets: [{ label: 'Revenue', data: @json($revenueData), backgroundColor: '#4e73df' }] }
});

new Chart(emailCtx, {
    type: 'line',
    data: { labels: @json($emailMonths), datasets: [{ label: 'Emails Sent', data: @json($emailData), borderColor: '#1cc88a', backgroundColor: 'rgba(28,200,138,0.2)', fill: true }] }
});
</script>
@endsection