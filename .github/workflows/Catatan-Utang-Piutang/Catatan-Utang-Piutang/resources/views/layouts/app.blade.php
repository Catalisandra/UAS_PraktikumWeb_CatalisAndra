<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Finance App</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">DB Finance</a>

            <div class="d-flex align-items-center">
                {{-- Menu Utama --}}
                <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-light me-2">Dashboard</a>
                <a href="{{ route('customers.index') }}" class="btn btn-sm btn-outline-light me-2">Pelanggan</a>
                <a href="{{ route('transactions.index') }}" class="btn btn-sm btn-outline-light me-2">Transaksi</a>
                <a href="{{ route('payments.index') }}" class="btn btn-sm btn-outline-light me-3">Pembayaran</a>

                {{-- Profil & Logout --}}
                <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-outline-light me-2">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Konten Halaman --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
