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


        <!-- About Start -->

        <!-- About End -->


        <!-- Overview Start -->

        <!-- Overview End -->


        <!-- Advanced Feature Start -->

        <!-- Advanced Feature End -->


        <!-- Facts Start -->

        <!-- Facts End -->


        <!-- Process Start -->

        <!-- Process End -->





        <!-- Testimonial Start -->

        <!-- Testimonial End -->
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
