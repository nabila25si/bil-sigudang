@extends('layouts.admin.app')

@section('content')
{{-- start main content --}}
<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title mb-1">Tambah Kategori</h1>
        <p class="page-subtitle text-muted mb-0">Isi formulir untuk menambahkan kategori barang baru.</p>
    </div>
    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Kategori</label>
                <input type="text" name="nama_kategori"
                       class="form-control @error('nama_kategori') is-invalid @enderror"
                       value="{{ old('nama_kategori') }}" placeholder="Contoh: Elektronik, Sembako, dll." required>
                @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control @error('deskripsi') is-invalid @enderror"
                          rows="4" placeholder="Keterangan singkat tentang kategori ini...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                    Batal
                </a>
                <button type="submit" class="btn btn-success" style="background-color: #0D3B2E; border-color: #0D3B2E;">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>
</div>
{{-- end main content --}}
@endsection
