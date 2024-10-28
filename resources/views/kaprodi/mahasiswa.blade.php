@extends('layout.app')

@section('title', 'Data Mahasiswa')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Data Mahasiswa</h1>
    </div>

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
                <th class="px-4 py-2 border border-gray-300 text-center">Dosen Wali</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $index => $mhs)
                <tr>
                    <td class="px-4 py-2 border border-gray-300 text-center">
                        {{ $index + $mahasiswa->firstItem() }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mhs->nama_mahasiswa }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mhs->nim }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mhs->fakultas }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mhs->program_studi }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mhs->no_telp }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mhs->peran }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $mhs->dosenWali->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Link Pagination -->
    <div class="mt-4">
        {{ $mahasiswa->links() }}
    </div>
@endsection
