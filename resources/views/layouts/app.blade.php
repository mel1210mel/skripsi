<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
    #sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #0d6efd;
        color: #fff;
        width: 220px;
        overflow-y: auto;
    }

    #content {
        margin-left: 220px;
        padding: 20px;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
</style>
<body>
<div class="d-flex" id="wrapper">
    <div class="bg-primary text-white sidebar" id="sidebar">
        <h4 class="p-3">SI-KGP</h4>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="/" class="nav-link text-white">Dashboard</a></li>
            <li class="nav-item"><a href="/items" class="nav-link text-white">Data Barang</a></li>
            <li class="nav-item"><a href="/suppliers" class="nav-link text-white">Data Supplier</a></li> <!-- ✅ Baru ditambahkan -->
            <li class="nav-item"><a href="/stock-in" class="nav-link text-white">Barang Masuk</a></li>
            <li class="nav-item"><a href="/stock-out" class="nav-link text-white">Barang Keluar</a></li>
            <li class="nav-item"><a href="/returns" class="nav-link text-white">Retur Barang</a></li>
            <li class="nav-item"><a href="/reports" class="nav-link text-white">Laporan Barang</a></li>
        </ul>
    </div>
    <div class="p-4 flex-grow-1" id="content" style="margin-left: 220px;">
        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
