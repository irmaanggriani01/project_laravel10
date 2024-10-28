@extends('layout.dosendashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-center">Edit Data Mahasiswa</h1>

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

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST"
        class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Nama Mahasiswa -->
        <div class="mb-4">
            <label for="nama_mahasiswa" class="block text-gray-700 font-bold mb-2">Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa }}"
                class="w-full px-3 py-2 border @error('nama_mahasiswa') border-red-500 @enderror rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
        </div>

        <!-- NIM -->
        <div class="mb-4">
            <label for="nim" class="block text-gray-700 font-bold mb-2">NIM</label>
            <input type="text" name="nim" id="nim" value="{{ $mahasiswa->nim }}"
                class="w-full px-3 py-2 border @error('nim') border-red-500 @enderror rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
        </div>

        <!-- Fakultas -->
        <div class="mb-4">
            <label for="fakultas" class="block text-gray-700 font-bold mb-2">Fakultas</label>
            <input type="text" name="fakultas" id="fakultas" value="{{ $mahasiswa->fakultas }}"
                class="w-full px-3 py-2 border @error('fakultas') border-red-500 @enderror rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
        </div>

        <!-- Program Studi -->
        <div class="mb-4">
            <label for="program_studi" class="block text-gray-700 font-bold mb-2">Program Studi</label>
            <input type="text" name="program_studi" id="program_studi" value="{{ $mahasiswa->program_studi }}"
                class="w-full px-3 py-2 border @error('program_studi') border-red-500 @enderror rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
        </div>

        <!-- No. Telepon -->
        <div class="mb-4">
            <label for="no_telp" class="block text-gray-700 font-bold mb-2">No. Telepon</label>
            <input type="text" name="no_telp" id="no_telp" value="{{ $mahasiswa->no_telp }}"
                class="w-full px-3 py-2 border @error('no_telp') border-red-500 @enderror rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
        </div>

        <!-- Pilih Mahasiswa -->
        <div class="mb-4">
            <label for="peran" class="block text-gray-700 font-bold mb-2">Pilih Mahasiswa</label>
            <select name="peran" id="peran"
                class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
                <option value="">Pilih Mahasiswa</option>
                @foreach ($allMahasiswa as $user)
                    <option value="{{ $user->id }}"
                        {{ old('peran', $mahasiswa->peran) == $user->name ? 'selected' : '' }}>
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
            Update
        </button>
    </form>
@endsection
