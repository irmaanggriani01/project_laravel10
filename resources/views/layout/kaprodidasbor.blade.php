@extends('layout.app')

@section('content')
    <div class="container mx-auto">
        <!-- Logo di bagian atas dengan penyesuaian tata letak -->
        <div class="flex justify-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-32 h-32">
        </div>
        <!-- Menampilkan teks di bawah logo -->
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-6">Selamat Datang, {{ Auth::user()->name }}</h1>
            <p class="mb-4">Ini adalah halaman dashboard Anda.</p>
        </div>
    </div>
@endsection