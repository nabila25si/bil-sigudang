
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Barang - SiGudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --hijau-tua: #0D3B2E;
            --hijau: #22C55E;
            --hijau-muda: #DCFCE7;
            --abu: #F3F4F6;
        }

        body {
            background-color: var(--abu);
        }

        .navbar {
            background-color: var(--hijau-tua);
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 24px;
        }

        .judul {
            color: var(--hijau-tua);
            font-weight: bold;
        }

        .form-card {
            background: white;
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            padding: 12px;
            border-radius: 8px;
        }

        .btn-simpan {
            background-color: var(--hijau-tua);
            color: white;
            border: none;
        }

        .btn-simpan:hover {
            background-color: var(--hijau);
            color: var(--hijau-tua);
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('items.index') }}">
                SiGudang
            </a>
        </div>
    </nav>

    <main class="container py-5">
        <h2 class="judul mb-2">Edit Barang</h2>
        <p class="text-secondary mb-4">
            Perbarui informasi barang yang tersimpan di SiGudang.
        </p>

        <div class="card form-card">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('items.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Kode Barang</label>
                        <input type="text" name="kode_barang"
                            class="form-control @error('kode_barang') is-invalid @enderror"
                            value="{{ old('kode_barang', $item->kode_barang) }}" required>
                        @error('kode_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang"
                            class="form-control @error('nama_barang') is-invalid @enderror"
                            value="{{ old('nama_barang', $item->nama_barang) }}" required>
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="kategori"
                            class="form-control @error('kategori') is-invalid @enderror"
                            value="{{ old('kategori', $item->kategori) }}" required>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok"
                            class="form-control @error('stok') is-invalid @enderror"
                            value="{{ old('stok', $item->stok) }}" min="0" required>
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Satuan</label>
                        <input type="text" name="satuan"
                            class="form-control @error('satuan') is-invalid @enderror"
                            value="{{ old('satuan', $item->satuan) }}" required>
                        @error('satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" name="lokasi"
                            class="form-control @error('lokasi') is-invalid @enderror"
                            value="{{ old('lokasi', $item->lokasi) }}">
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi"
                            class="form-control @error('deskripsi') is-invalid @enderror"
                            rows="3">{{ old('deskripsi', $item->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-simpan px-4 py-2">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('items.index') }}"
                       class="btn btn-outline-secondary px-4 py-2 ms-2">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
