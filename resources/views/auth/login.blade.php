
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - SiGudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width:450px">
        <div class="card p-4 shadow-sm">
            <h2 class="mb-4">Login SiGudang</h2>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    Username dan password wajib diisi.
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Login</button>
                <a href="{{ route('register') }}" class="d-block text-center mt-3">Belum punya akun? Register</a>
                <a href="{{ route('guest') }}" class="d-block text-center mt-2">Kembali ke Home</a>
            </form>
        </div>
    </div>
</body>
</html>
