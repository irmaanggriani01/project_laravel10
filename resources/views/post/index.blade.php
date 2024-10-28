@extends('layout.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Data Dosen</h1>

    @if ($message = Session::get('success'))
        <p class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">{{ $message }}</p>
    @endif

    <a href="{{ route('post.create') }}"
        class="inline-block mb-6 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Data Dosen</a>

    <table class="min-w-full bg-white border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border border-gray-300 text-center">No</th>
                <!-- Mengubah text-left menjadi text-center -->
                <th class="px-4 py-2 border border-gray-300 text-center">Nama Dosen</th>
                <!-- Mengubah text-left menjadi text-center -->
                <th class="px-4 py-2 border border-gray-300 text-center">NIP</th>
                <!-- Mengubah text-left menjadi text-center -->
                <th class="px-4 py-2 border border-gray-300 text-center">Fakultas</th>
                <!-- Mengubah text-left menjadi text-center -->
                <th class="px-4 py-2 border border-gray-300 text-center">Matakuliah</th>
                <!-- Mengubah text-left menjadi text-center -->
                <th class="px-4 py-2 border border-gray-300 text-center">No Telpon</th>
                <!-- Mengubah text-left menjadi text-center -->
                <th class="px-4 py-2 border border-gray-300 text-center">Peran</th>
                <!-- Mengubah text-left menjadi text-center -->
                <th class="px-4 py-2 border border-gray-300 text-center">Aksi</th>
                <!-- Mengubah text-left menjadi text-center -->
            </tr>
        </thead>
        <tbody>
            @php $index = 0; @endphp  {{-- Inisialisasi variabel index --}}
            @foreach ($posts as $post)
                <tr>
                    <td class="px-4 py-2 border border-gray-300 text-center">{{ ++$index }}</td> {{-- Increment index --}}
                    <td class="px-4 py-2 border border-gray-300">{{ $post->nama_dosen }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $post->nip }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $post->fakultas }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $post->matakuliah }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $post->no_telp }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $post->peran }}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        <a href="{{ route('post.edit', $post->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-4 text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
