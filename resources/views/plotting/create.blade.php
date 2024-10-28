@extends('layout.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Tambah Data Plotting</h1>

        @if ($errors->any())
            <div class="bg-red-200 text-red-700 border border-red-300 rounded p-4 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('plotting.store') }}" method="POST" class="bg-white shadow-md rounded p-6">
            @csrf

            <div class="mb-4">
                <label for="mahasiswa_id" class="block text-sm font-medium text-gray-700">Mahasiswa</label>
                <select name="mahasiswa_id" id="mahasiswa_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                    <option value="">Pilih Mahasiswa</option>
                    @foreach ($mahasiswaList as $mahasiswa)
                        <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama_mahasiswa }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="post_id" class="block text-sm font-medium text-gray-700">Pilih Dosen & Matakuliah</label>
                <select name="post_id" id="post_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                    <option value="">Dosen & Matakuliah</option>
                    @foreach ($postList as $post)
                        <option value="{{ $post->id }}">
                            {{ $post->nama_dosen }} ({{ $post->matakuliah }})
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-4">
                <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas</label>
                <select name="kelas_id" id="kelas_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelasList as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="hari_tanggal" class="block text-sm font-medium text-gray-700">Hari dan Tanggal</label>
                <div class="flex space-x-4">
                    <select name="hari" id="hari" class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300" required>
                        <option value="">Pilih Hari</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
            
                    <input type="date" name="tanggal" id="tanggal" class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300" required min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                </div>
            </div>
            
            
            <div class="mb-4">
                <label for="waktu_mulai" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                <input type="time" name="waktu_mulai" id="waktu_mulai"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                    required>
            </div>

            <div class="mb-4">
                <label for="waktu_selesai" class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                <input type="time" name="waktu_selesai" id="waktu_selesai"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                    required>
            </div>

            <button type="submit"
                class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Simpan</button>
        </form>
    </div>
@endsection
