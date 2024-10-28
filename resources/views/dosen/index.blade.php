@extends('layout.dosendashboard')

@section('title', 'Daftar Permintaan Edit Data')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md max-w-3xl mx-auto mt-10">
        <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800">Daftar Permintaan Edit Data</h1>

        @if ($requests->isEmpty())
            <p class="text-center text-gray-600">Tidak ada permintaan edit data saat ini.</p>
        @else
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="px-4 py-2 border border-gray-300">Mahasiswa</th>
                        <th class="px-4 py-2 border border-gray-300">Kolom yang Ingin Diedit</th>
                        <th class="px-4 py-2 border border-gray-300">Nilai Baru</th>
                        <th class="px-4 py-2 border border-gray-300 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300">{{ $request->mahasiswa->nama_mahasiswa }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $request->field_to_edit }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $request->new_value }}</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">
                                <form action="{{ route('dosen.requests.approve', $request->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                                        Setujui
                                    </button>
                                </form>
                                <form action="{{ route('dosen.requests.reject', $request->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded ml-2">
                                        Tolak
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
