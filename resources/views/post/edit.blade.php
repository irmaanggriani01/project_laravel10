@extends('layout.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-center">Edit Post</h1>

    <form action="{{ route('post.update', $post->id) }}" method="POST"
        class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Nama Dosen -->
        <div class="mb-4">
            <label for="nama_dosen" class="block text-gray-700 font-bold mb-2">Nama Dosen:</label>
            <input type="text" name="nama_dosen" id="nama_dosen" value="{{ $post->nama_dosen }}"
                class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
        </div>

        <!-- NIP -->
        <div class="mb-4">
            <label for="nip" class="block text-gray-700 font-bold mb-2">NIP:</label>
            <input type="text" name="nip" id="nip" value="{{ $post->nip }}"
                class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
        </div>

        <!-- Fakultas -->
        <div class="mb-4">
            <label for="fakultas" class="block text-gray-700 font-bold mb-2">Fakultas:</label>
            <input type="text" name="fakultas" id="fakultas" value="{{ $post->fakultas }}"
                class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
        </div>

        <!-- Matakuliah -->
        <div class="mb-4">
            <label for="matakuliah" class="block text-gray-700 font-bold mb-2">Matakuliah:</label>
            <select name="matakuliah" id="matakuliah"
                class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
                <option value="">Pilih Matakuliah</option>
                <option value="Web programming" {{ old('matakuliah') == 'Web programming' ? 'selected' : '' }}>Web
                    programming</option>
                <option value="Perancangan Sistem Informasi Berorientasi Objek"
                    {{ old('matakuliah') == 'Perancangan Sistem Informasi Berorientasi Objek' ? 'selected' : '' }}>
                    Perancangan Sistem Informasi Berorientasi Objek</option>
                <option value="Sistem Basis Data" {{ old('matakuliah') == 'Sistem Basis Data' ? 'selected' : '' }}>Sistem
                    Basis Data</option>
                <option value="Mobile Programming" {{ old('matakuliah') == 'Mobile Programming' ? 'selected' : '' }}>Mobile
                    Programming</option>
                <option value="Dasar Pemrograman" {{ old('matakuliah') == 'Dasar Pemrograman' ? 'selected' : '' }}>Dasar
                    Pemrograman</option>
                <!-- Tambahkan pilihan lainnya sesuai kebutuhan -->
            </select>
        </div>

        <!-- No Telepon -->
        <div class="mb-4">
            <label for="no_telp" class="block text-gray-700 font-bold mb-2">No Telepon:</label>
            <input type="text" name="no_telp" id="no_telp" value="{{ $post->no_telp }}"
                class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
        </div>

        <!-- Peran -->
        <div class="mb-4">
            <label for="peran" class="block text-gray-700 font-bold mb-2">Peran</label>
            <select name="peran" id="peran"
                class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                required>
                <option value="">Pilih Peran</option>
                @foreach ($dosen as $name)
                    <option value="{{ $name }}" {{ old('peran') == $name ? 'selected' : '' }}>
                        {{ $name }}
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
