@extends('layout.dosendashboard')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Jadwal Plotting Dosen</h1>

    @if($jadwalPlotting->isEmpty())
        <p>Tidak ada jadwal plotting.</p>
    @else
        <table class="min-w-full bg-white shadow-md rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Kelas</th>
                    <th class="px-4 py-2 border">Hari</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Waktu Mulai</th>
                    <th class="px-4 py-2 border">Waktu Selesai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwalPlotting as $jadwal)
                    <tr>
                        <td class="px-4 py-2 border">{{ $jadwal->kelas->kelas }}</td>
                        <td class="px-4 py-2 border">{{ $jadwal->hari }}</td>
                        <td class="px-4 py-2 border">{{ $jadwal->tanggal }}</td>
                        <td class="px-4 py-2 border">{{ $jadwal->waktu_mulai }}</td>
                        <td class="px-4 py-2 border">{{ $jadwal->waktu_selesai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
