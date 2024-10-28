@extends('layout.dosendashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Data Mahasiswa</h1>

    <!-- Pesan Success -->
    @if ($message = Session::get('success'))
        <p class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">{{ $message }}</p>
    @endif

    <!-- Pesan Error -->
    @if ($errors->any())
        <ul class="bg-red-100 text-red-700 p-4 rounded mb-4">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Tombol Tambah Data Mahasiswa -->
    <a href="{{ route('mahasiswa.create') }}"
        class="inline-block mb-6 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Data Mahasiswa</a>

    <!-- Tabel Mahasiswa -->
    <table class="min-w-full bg-white border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border border-gray-300 text-center">No</th>
                <th class="px-4 py-2 border border-gray-300 text-center">Nama Mahasiswa</th>
                <th class="px-4 py-2 border border-gray-300 text-center">NIM</th>
                <th class="px-4 py-2 border border-gray-300 text-center">Fakultas</th>
                <th class="px-4 py-2 border border-gray-300 text-center">Program Studi</th>
                <th class="px-4 py-2 border border-gray-300 text-center">No. Telepon</th>
                <th class="px-4 py-2 border border-gray-300 text-center">Peran</th>
                <th class="px-4 py-2 border border-gray-300 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $index => $mahasiswa)
                <tr>
                    <td class="px-4 py-2 border border-gray-300 text-center">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mahasiswa->nama_mahasiswa }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mahasiswa->nim }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mahasiswa->fakultas }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mahasiswa->program_studi }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mahasiswa->no_telp }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mahasiswa->peran }}</td>
                    <td class="px-4 py-2 border border-gray-300 text-center">
                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-4 text-red-500 hover:underline"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
