@extends('layout.mahasiswadashboard')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Jadwal Plotting</h1>

        @if ($jadwalPlotting->isEmpty())
            <p>Tidak ada jadwal yang tersedia.</p>
        @else
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="border border-gray-300 px-4 py-2 font-semibold">Dosen & Matakuliah</th>
                        <th class="border border-gray-300 px-4 py-2 font-semibold">Kelas</th>
                        <th class="border border-gray-300 px-4 py-2 font-semibold">Hari & Tanggal</th>
                        <th class="border border-gray-300 px-4 py-2 font-semibold">Waktu Mulai</th>
                        <th class="border border-gray-300 px-4 py-2 font-semibold">Waktu Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwalPlotting as $plotting)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $plotting->post->nama_dosen }}
                                ({{ $plotting->post->matakuliah }})
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $plotting->kelas->kelas }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $plotting->hari }} -
                                {{ \Carbon\Carbon::parse($plotting->tanggal)->format('d/m/Y') }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $plotting->waktu_mulai }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $plotting->waktu_selesai }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
