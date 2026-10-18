
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Barang - SiGudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #F3F4F6; color: #0D3B2E; }
        .navbar { background: #0D3B2E; }
        .card { border: none; border-radius: 12px; }
        .btn-success { background: #0D3B2E; border-color: #0D3B2E; }
        .table thead th { background: #DCFCE7; color: #0D3B2E; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark px-4 py-3">
        <span class="navbar-brand fw-bold">SiGudang</span>
    </nav>

    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Data Barang</h2>
                <p class="text-secondary mb-0">Kelola data dan pantau stok barang UMKM.</p>
            </div>
            <a href="{{ route('items.create') }}" class="btn btn-success">
                + Tambah Barang
            </a>
        </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

        <div class="card shadow-sm">
            <div class="card-body">
                @if ($items->isEmpty())
                    <p class="text-secondary mb-0">Belum ada data barang.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->kode_barang }}</td>
                                        <td class="fw-semibold">{{ $item->nama_barang }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>
                                            <a href="{{ route('items.edit', $item->id) }}"
                                               class="btn btn-sm btn-outline-success">Edit</a>

                                            <form action="{{ route('items.destroy', $item->id) }}"
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>
