<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Barang - SiGudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --hijau-tua: #0D3B2E;
            --hijau: #22C55E;
            --hijau-muda: #DCFCE7;
            --latar: #F3F4F6;
        }

        body {
            background-color: var(--latar);
            color: var(--hijau-tua);
        }

        .navbar-sigudang {
            background-color: var(--hijau-tua);
        }

        .navbar-brand {
            color: white;
            font-weight: 700;
            font-size: 1.4rem;
        }

        .navbar-brand:hover {
            color: var(--hijau-muda);
        }

        .page-title {
            color: var(--hijau-tua);
            font-weight: 700;
        }

        .form-card {
            background-color: white;
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            padding: 10px 12px;
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: var(--hijau);
            box-shadow: 0 0 0 0.2rem rgba(34, 197, 94, 0.15);
        }

        .btn-sigudang {
            background-color: var(--hijau-tua);
            border-color: var(--hijau-tua);
            color: white;
        }

        .btn-sigudang:hover {
            background-color: #155640;
            border-color: #155640;
            color: white;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-sigudang px-4 py-3">
    <a class="navbar-brand text-decoration-none"
       href="{{ route('items.index') }}">SiGudang</a>
</nav>

<div class="container py-5">
    <div class="mb-4">
        <h2 class="page-title">Tambah Barang</h2>
        <p class="text-secondary mb-0">
            Isi formulir untuk menambahkan barang ke SiGudang.
        </p>
    </div>

    <div class="card form-card">
        <div class="card-body p-4 p-md-5">

            <form action="{{ route('items.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang"
                           class="form-control @error('kode_barang') is-invalid @enderror"
                           value="{{ old('kode_barang') }}" required>
                    @error('kode_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang"
                           class="form-control @error('nama_barang') is-invalid @enderror"
                           value="{{ old('nama_barang') }}" required>
                    @error('nama_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori"
                           class="form-control @error('kategori') is-invalid @enderror"
                           value="{{ old('kategori') }}" required>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok"
                           class="form-control @error('stok') is-invalid @enderror"
                           value="{{ old('stok', 0) }}" min="0" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Satuan</label>
                    <input type="text" name="satuan"
                           class="form-control @error('satuan') is-invalid @enderror"
                           value="{{ old('satuan') }}" required>
                    @error('satuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" name="lokasi"
                    class="form-control @error('lokasi') is-invalid @enderror"
                    value="{{ old('lokasi') }}">

                @error('lokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                   </div>