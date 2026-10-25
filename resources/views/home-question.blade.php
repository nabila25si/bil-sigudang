<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pertanyaan - SiGudang</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Heebo', sans-serif;
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .form-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
            padding: 32px;
            max-width: 520px;
            width: 100%;
        }
        .form-title {
            font-size: 1.35rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 18px;
        }
        /* Custom Alert Info sesuai tampilan modul Pertemuan 5 */
        .alert-info-custom {
            background-color: #cff4fc;
            color: #055160;
            border: 1px solid #b6effb;
            border-radius: 8px;
            padding: 16px 20px;
            font-size: 0.95rem;
            line-height: 1.55;
            margin-bottom: 22px;
        }
        .alert-info-custom strong,
        .alert-info-custom b {
            font-weight: 700;
            color: #022c35;
        }
        .form-label {
            font-size: 0.95rem;
            font-weight: 500;
            color: #334155;
            margin-bottom: 6px;
        }
        .form-control {
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            padding: 9px 12px;
            font-size: 0.95rem;
        }
        .form-control:focus {
            border-color: #0284c7;
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
        }
        .btn-submit {
            background-color: #0284c7;
            border-color: #0284c7;
            color: white;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 9px 22px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }
        .btn-submit:hover {
            background-color: #0369a1;
            border-color: #0369a1;
            color: white;
        }
    </style>
</head>
<body>

    <div class="form-card">
        <h1 class="form-title">Form Pertanyaan</h1>

        <!-- Notifikasi Flash Data Info Sesuai Modul Pertemuan 5 -->
        @if (session('info'))
            <div class="alert-info-custom" role="alert">
                {!! session('info') !!}
            </div>
        @endif

        <form action="{{ route('question.store') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text"
                       class="form-control @error('nama') is-invalid @enderror"
                       id="nama"
                       name="nama"
                       value="{{ old('nama') }}"
                       placeholder="Masukkan nama Anda">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="contoh: nama@domain.com">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pertanyaan -->
            <div class="mb-4">
                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                <textarea class="form-control @error('pertanyaan') is-invalid @enderror"
                          id="pertanyaan"
                          name="pertanyaan"
                          rows="4"
                          placeholder="Tuliskan pertanyaan Anda...">{{ old('pertanyaan') }}</textarea>
                @error('pertanyaan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Kirim -->
            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-submit">
                    Kirim Pertanyaan
                </button>
                <a href="{{ route('guest') }}" class="text-secondary text-decoration-none small">
                    Kembali ke Beranda
                </a>
            </div>
        </form>
    </div>

</body>
</html>
