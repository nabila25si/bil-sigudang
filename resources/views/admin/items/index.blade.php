@extends('layouts.admin.app')

@section('content')
{{-- start main content --}}
<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title mb-1">Data Barang</h1>
        <p class="page-subtitle text-muted mb-0">Kelola data dan pantau stok barang UMKM.</p>
    </div>
    <a href="{{ route('items.create') }}" class="btn btn-success" style="background-color: #0D3B2E; border-color: #0D3B2E;">
        <i class="bi bi-plus-lg me-1"></i> Tambah Barang
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        @if ($items->isEmpty())
            <p class="text-secondary mb-0">Belum ada data barang.</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
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
                                <td><span class="badge bg-light text-dark border">{{ $item->kode_barang }}</span></td>
                                <td class="fw-semibold">{{ $item->nama_barang }}</td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        {{ $item->category?->nama_kategori ?? $item->kategori ?? '-' }}
                                    </span>
                                </td>
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
{{-- end main content --}}
@endsection
