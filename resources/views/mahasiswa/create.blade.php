@extends('layout.dosendashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-center">Tambah Data Mahasiswa</h1>

    @if ($errors->any())
        <ul class="bg-red-100 text-red-700 p-4 rounded mb-4">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Nama Mahasiswa -->
        <div class="mb-4">
            <label for="nama_mahasiswa" class="block text-gray-700 font-bold mb-2">Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}"
                class="w-full px-3 py-2 border @error('nama_mahasiswa') border-red-500 @enderror rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
            @error('nama_mahasiswa')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- NIM -->
        <div class="mb-4">
            <label for="nim" class="block text-gray-700 font-bold mb-2">NIM</label>
            <input type="text" name="nim" id="nim" value="{{ old('nim') }}"
                class="w-full px-3 py-2 border @error('nim') border-red-500 @enderror rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
            @error('nim')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Fakultas -->
        <div class="mb-4">
            <label for="fakultas" class="block text-gray-700 font-bold mb-2">Fakultas</label>
            <input type="text" name="fakultas" id="fakultas" value="{{ old('fakultas') }}"
                class="w-full px-3 py-2 border @error('fakultas') border-red-500 @enderror rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
            @error('fakultas')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Program Studi -->
        <div class="mb-4">
            <label for="program_studi" class="block text-gray-700 font-bold mb-2">Program Studi</label>
            <input type="text" name="program_studi" id="program_studi" value="{{ old('program_studi') }}"
                class="w-full px-3 py-2 border @error('program_studi') border-red-500 @enderror rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
            @error('program_studi')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- No. Telepon -->
        <div class="mb-4">
            <label for="no_telp" class="block text-gray-700 font-bold mb-2">No. Telepon</label>
            <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp') }}"
                class="w-full px-3 py-2 border @error('no_telp') border-red-500 @enderror rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
            @error('no_telp')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Pilih Mahasiswa -->
        <div class="mb-4">
            <label for="peran" class="block text-gray-700 font-bold mb-2">Pilih Mahasiswa</label>
            <select name="peran" id="peran"
                class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
                <option value="">Pilih Mahasiswa</option>
                @foreach ($allMahasiswa as $user)
                    <option value="{{ $user->id }}" {{ old('peran') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('peran')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
            Submit
        </button>
    </form>
@endsection
