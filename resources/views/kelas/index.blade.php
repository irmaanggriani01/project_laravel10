@extends('layout.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Data Kelas</h1>

    @if ($message = Session::get('success'))
        <p class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">{{ $message }}</p>
    @endif

    <a href="{{ route('kelas.create') }}"
        class="inline-block mb-6 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Data Kelas</a>

    <table class="min-w-full bg-white border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border border-gray-300 text-center">No</th>
                <th class="px-4 py-2 border border-gray-300 text-center">Nama Kelas</th>
                <th class="px-4 py-2 border border-gray-300 text-center">Ruangan</th>
                <th class="px-4 py-2 border border-gray-300 text-center">Lantai</th>
                <th class="px-4 py-2 border border-gray-300 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $index = 0; @endphp {{-- Inisialisasi variabel index --}}
            @foreach ($kelas as $item)
                {{-- Mengganti nama variabel di dalam foreach --}}
                <tr>
                    <td class="px-4 py-2 border border-gray-300 text-center">{{ ++$index }}</td> {{-- Increment index --}}
                    <td class="px-4 py-2 border border-gray-300">{{ $item->kelas }}</td> {{-- Menampilkan nama kelas --}}
                    <td class="px-4 py-2 border border-gray-300">{{ $item->ruangan }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $item->lantai }}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        <a href="{{ route('kelas.edit', $item->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('kelas.destroy', $item->id) }}" method="POST" class="inline-block">
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
