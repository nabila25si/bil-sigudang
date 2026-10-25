<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respon Pertanyaan - SiGudang</title>
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
        .response-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.03);
            border: 1px solid #e2e8f0;
            padding: 40px;
            max-width: 640px;
            width: 100%;
            text-align: center;
        }
        .response-title {
            color: #2563eb;
            font-weight: 700;
            font-size: 1.85rem;
            margin-bottom: 8px;
        }
        .response-subtitle {
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 24px;
        }
        .question-box {
            background-color: #f8fafc;
            border-left: 4px solid #2563eb;
            border-radius: 6px;
            padding: 16px 20px;
            margin-bottom: 24px;
            text-align: center;
        }
        .question-label {
            font-weight: 700;
            font-size: 0.85rem;
            color: #1e293b;
            margin-bottom: 6px;
        }
        .question-content {
            font-style: italic;
            color: #334155;
            font-size: 0.95rem;
            margin-bottom: 0;
        }
        .response-info {
            font-size: 0.85rem;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 24px;
        }
        .btn-back {
            background-color: #0284c7;
            border-color: #0284c7;
            color: white;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 10px 28px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s ease;
        }
        .btn-back:hover {
            background-color: #0369a1;
            border-color: #0369a1;
            color: white;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

    <div class="response-card">
        <!-- Judul Respon -->
        <h2 class="response-title">Terima Kasih, {{ $nama }}! 🎉</h2>
        <p class="response-subtitle">Pertanyaan Anda telah berhasil dikirim.</p>

        <!-- Kotak Pertanyaan -->
        <div class="question-box">
            <div class="question-label">Pertanyaan Anda:</div>
            <p class="question-content">“{{ $pertanyaan }}”</p>
        </div>

        <!-- Keterangan Tambahan -->
        <div class="response-info">
            <p class="mb-1">
                Pertanyaan Anda akan segera kami tanggapi dan balas melalui email <strong>{{ $email }}</strong>.
            </p>
            <p class="mb-0 text-muted">
                Mohon cek kotak masuk atau folder spam Anda secara berkala.
            </p>
        </div>

        <!-- Tombol Kembali -->
        <a href="{{ route('guest') }}" class="btn-back">
            Kembali ke Beranda
        </a>
    </div>

</body>
</html>
