@extends('layouts.admin.app')

@section('content')
{{-- start main content --}}
<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title mb-1">Data Kategori</h1>
        <p class="page-subtitle text-muted mb-0">Kelola kategori barang di gudang (CRUD Query Builder & Relasi Join).</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn btn-success" style="background-color: #0D3B2E; border-color: #0D3B2E;">
        <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
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
        {{-- Form Pencarian Menggunakan Query Builder (where & nested where) --}}
        <form action="{{ route('categories.index') }}" method="GET" class="row g-2 mb-3">
            <div class="col-md-5 col-lg-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama atau deskripsi..." value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i> Cari
                    </button>
                    @if(request('search'))
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-danger">Reset</a>
                    @endif
                </div>
            </div>
        </form>

        @if ($categories->isEmpty())
            <p class="text-secondary mb-0">Belum ada data kategori yang ditemukan.</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Total Barang Terkait</th>
                            <th style="width: 160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                            <tr>
                                <td>{{ $categories->firstItem() + $index }}</td>
                                <td class="fw-semibold">{{ $category->nama_kategori }}</td>
                                <td class="text-muted">{{ $category->deskripsi ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-box me-1"></i>{{ $category->total_items }} Barang
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                       class="btn btn-sm btn-outline-success">Edit</a>

                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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

            <div class="mt-3">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</div>
{{-- end main content --}}
@endsection
