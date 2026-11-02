{{-- Partial View: Katalog Stok Barang Gudang untuk Pengunjung (Guest) --}}
<div class="container-xxl py-6" id="katalog">
    <div class="container">
        <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Katalog Stok Barang Gudang</h1>
            <p class="mb-5 text-secondary">Lihat ketersediaan barang dan kategori stok yang tersimpan di sistem SiGudang secara real-time.</p>
        </div>

        {{-- Filter & Pencarian --}}
        <div class="row justify-content-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <div class="col-lg-8">
                <form action="{{ route('guest') }}#katalog" method="GET" class="card p-3 border-0 shadow-sm">
                    <div class="row g-2">
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                                <input type="text" name="search" class="form-control border-start-0" placeholder="Cari nama barang atau kode..." value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select name="category_id" class="form-select">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 d-flex gap-2">
                            <button type="submit" class="btn btn-primary w-100 rounded-pill">Filter</button>
                            @if(request('search') || request('category_id'))
                                <a href="{{ route('guest') }}#katalog" class="btn btn-outline-secondary rounded-pill">Reset</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Card Grid List Barang (Menampilkan Relasi Kategori di Setiap Kartu) --}}
        <div class="row g-4">
            @forelse ($items as $item)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge bg-light text-dark border px-2 py-1">
                                    {{ $item->kode_barang }}
                                </span>
                                {{-- Relasi Kategori yang ditampilkan di Guest --}}
                                <span class="badge bg-success text-white px-2 py-1">
                                    {{ $item->category?->nama_kategori ?? $item->kategori ?? 'Umum' }}
                                </span>
                            </div>

                            <h5 class="card-title fw-bold text-dark mb-2">{{ $item->nama_barang }}</h5>
                            
                            <p class="card-text text-muted small flex-grow-1 mb-3">
                                {{ Str::limit($item->deskripsi ?? 'Tidak ada keterangan tambahan.', 80) }}
                            </p>

                            <hr class="my-2 border-light">

                            <div class="d-flex justify-content-between align-items-center pt-2">
                                <div>
                                    <small class="text-muted d-block">Stok Tersedia</small>
                                    <span class="fw-bold fs-5 {{ $item->stok > 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $item->stok }} <span class="fs-6 fw-normal text-muted">{{ $item->satuan }}</span>
                                    </span>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block">Lokasi</small>
                                    <span class="small fw-semibold text-secondary">
                                        <i class="bi bi-geo-alt text-danger me-1"></i>{{ $item->lokasi ?? '-' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="p-5 bg-light rounded-4">
                        <i class="bi bi-box-seam display-4 text-muted mb-3 d-block"></i>
                        <h5 class="text-secondary">Tidak ada barang yang ditemukan</h5>
                        <p class="text-muted mb-0">Coba ubah kata kunci pencarian atau filter kategori Anda.</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $items->fragment('katalog')->links() }}
        </div>
    </div>
</div>
