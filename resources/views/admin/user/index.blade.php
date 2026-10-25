@extends('layouts.admin.app')

@section('content')
{{-- start main content --}}
<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title mb-1">Data User</h1>
        <p class="page-subtitle text-muted mb-0">Kelola akun dan hak akses pengguna sistem SiGudang.</p>
    </div>
    <a href="{{ route('user.create') }}" class="btn btn-success" style="background-color: #0D3B2E; border-color: #0D3B2E;">
        <i class="bi bi-person-plus-fill me-1"></i> Tambah User
    </a>
</div>

{{-- Flash data success --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif

{{-- Flash data error --}}
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        @if ($users->isEmpty())
            <p class="text-secondary mb-0">Belum ada data user.</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Terdaftar Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm rounded-circle bg-light d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px; color: #0D3B2E;">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <span>{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at ? $user->created_at->format('d M Y H:i') : '-' }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}"
                                       class="btn btn-sm btn-outline-success">Edit</a>

                                    <form action="{{ route('user.destroy', $user->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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
