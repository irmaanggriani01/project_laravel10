@extends('layout.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Data Plotting Jadwal Mahasiswa dan Dosen</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-700 border border-green-300 rounded p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('plotting.create') }}"
            class="inline-block mb-6 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Data Plotting</a>

        <table class="min-w-full border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 p-2">Mahasiswa</th>
                    <th class="border border-gray-300 p-2">Dosen</th>
                    <th class="border border-gray-300 p-2">Kelas</th>
                    <th class="border border-gray-300 p-2">Hari</th>
                    <th class="border border-gray-300 p-2">Tanggal</th> <!-- Menambahkan kolom Tanggal -->
                    <th class="border border-gray-300 p-2">Waktu Mulai</th>
                    <th class="border border-gray-300 p-2">Waktu Selesai</th>
                    <th class="border border-gray-300 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plotting as $item)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $item->mahasiswa->nama_mahasiswa }}</td>
                        <td class="border border-gray-300 p-2">{{ $item->post->nama_dosen }} ({{ $item->post->matakuliah }})
                        </td> <!-- Mengambil nama dosen dan matakuliah -->
                        <td class="border border-gray-300 p-2">{{ $item->kelas->kelas }}</td>
                        <td class="border border-gray-300 p-2">{{ $item->hari }}</td> <!-- Hari -->
                        <td class="border border-gray-300 p-2">{{ $item->tanggal }}</td> <!-- Tanggal -->
                        <td class="border border-gray-300 p-2">{{ $item->waktu_mulai }}</td>
                        <td class="border border-gray-300 p-2">{{ $item->waktu_selesai }}</td>
                        <td class="border border-gray-300 p-2">
                            <form action="{{ route('plotting.destroy', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-4 text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Link Pagination -->
        <div class="mt-4">
            {{ $plotting->links() }}
        </div>
    </div>
@endsection
