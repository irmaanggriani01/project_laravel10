<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    @if (Auth::user()->role == 'kaprodi')
    return view('post.index');
    @elseif (Auth::user()->role == 'dosen_biasa')
        <p>Ini halaman untuk Dosen Biasa.</p>
        <!-- Tampilkan konten spesifik untuk Dosen Biasa -->
    @elseif (Auth::user()->role == 'dosen_wali')
        <p>Ini halaman untuk Dosen Wali.</p>
        <!-- Tampilkan konten spesifik untuk Dosen Wali -->
    @elseif (Auth::user()->role == 'mahasiswa')
        <p>Ini halaman untuk Mahasiswa.</p>
        <!-- Tampilkan konten spesifik untuk Mahasiswa -->
    @endif
</body>
</html>
