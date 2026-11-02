<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>soFFer - Software Landing Page Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-guest/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0" id="home">
            @include('layouts.guest.navbar')


            <div class="container-xxl hero-header">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">Sistem Pencatatan Stok Barang UMKM</h1>

                            <p class="text-white pb-3 animated slideInDown">
                                Catat data barang, pantau jumlah stok, dan kelola persediaan
                                UMKM dengan lebih mudah melalui SiGudang.
                            </p>

                            <div class="position-relative w-100 mt-3">
                                <a href="#features" class="btn btn-primary rounded-pill py-3 px-4 shadow-none">
                                    Lihat Cara Kerja SiGudang
                                </a>
                            </div>


                            </div>
                            <div class="col-lg-6 text-center">
                        <img class="img-fluid"
                             src="{{ asset('assets-guest/img/hero.jpg') }}"
                             alt="Ilustrasi SiGudang">
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Feature Start -->
        <div class="container-xxl bg-white py-6">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-edit text-success mb-4"></i>
                            <h5 class="mb-3">Pemantauan Jumlah Stok</h5>
                            <p class="m-0">Pantau jumlah stok barang agar persediaan UMKM lebih mudah diperiksa.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-sync text-success mb-4"></i>
                            <h5 class="mb-3">Pengelolaan Data Barang</h5>
                            <p class="m-0">Simpan informasi nama barang, kategori, stok, satuan, dan lokasi dalam satu sistem.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-draw-polygon text-success mb-4"></i>
                            <h5 class="mb-3">Informasi Stok Terstruktur</h5>
                            <p class="m-0">Susun data persediaan agar barang lebih mudah dicatat dan diperiksa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End -->

        <!-- Katalog Barang Start -->
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

                {{-- Card Grid List Barang --}}
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
        <!-- Katalog Barang End -->
        <!-- Contact Start -->
        <div class="container-xxl py-6" id="contact">
            <div class="container">
                <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Form Pertanyaan & Kontak</h1>
                    <p class="mb-5 text-secondary">Punya pertanyaan seputar SiGudang atau manajemen stok UMKM Anda? Kirimkan pertanyaan Anda melalui formulir di bawah ini.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-light rounded p-4 p-sm-5 shadow-sm">
                            <h3 class="mb-4 fw-bold text-dark">Form Pertanyaan</h3>
                            @if (session('info'))
                                <div class="alert mb-4" style="background-color: #cff4fc; color: #055160; border: 1px solid #b6effb; border-radius: 8px; padding: 16px 20px; line-height: 1.55;" role="alert">
                                    {!! session('info') !!}
                                </div>
                            @endif
                            <form action="{{ route('question.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text"
                                                   class="form-control @error('nama') is-invalid @enderror"
                                                   id="nama"
                                                   name="nama"
                                                   placeholder="Nama Lengkap"
                                                   value="{{ old('nama') }}">
                                            <label for="nama">Nama Lengkap</label>
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   id="email"
                                                   name="email"
                                                   placeholder="Email Aktif"
                                                   value="{{ old('email') }}">
                                            <label for="email">Email</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control @error('pertanyaan') is-invalid @enderror"
                                                      placeholder="Tuliskan pertanyaan Anda..."
                                                      id="pertanyaan"
                                                      name="pertanyaan"
                                                      style="height: 150px">{{ old('pertanyaan') }}</textarea>
                                            <label for="pertanyaan">Pertanyaan</label>
                                            @error('pertanyaan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary rounded-pill py-3 px-5 shadow-none" type="submit">
                                            Kirim Pertanyaan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Footer Start -->
        @include('layouts.guest.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-guest/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>

    <!-- Template Javascript -->
</body>

</html>
