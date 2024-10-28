@extends('layout.dosendashboard')

@section('title', 'Profil Dosen')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto mt-10">
        <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800">Profil Dosen</h1>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if ($post)
            <div class="space-y-4">
                <div class="flex justify-between border-b pb-2">
                    <strong class="text-gray-700 w-1/3">Nama Dosen :</strong>
                    <span class="text-gray-600 w-2/3">{{ $post->nama_dosen }}</span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <strong class="text-gray-700 w-1/3">NIP :</strong>
                    <span class="text-gray-600 w-2/3">{{ $post->nip }}</span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <strong class="text-gray-700 w-1/3">Fakultas :</strong>
                    <span class="text-gray-600 w-2/3">{{ $post->fakultas }}</span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <strong class="text-gray-700 w-1/3">Mata Kuliah :</strong>
                    <span class="text-gray-600 w-2/3">{{ $post->matakuliah }}</span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <strong class="text-gray-700 w-1/3">No. Telepon :</strong>
                    <span class="text-gray-600 w-2/3">{{ $post->no_telp }}</span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <strong class="text-gray-700 w-1/3">Peran :</strong>
                    <span class="text-gray-600 w-2/3">{{ $post->peran }}</span>
                </div>
            </div>
        @else
            <p class="text-red-500">Data dosen tidak ditemukan.</p>
        @endif
    </div>
@endsection
