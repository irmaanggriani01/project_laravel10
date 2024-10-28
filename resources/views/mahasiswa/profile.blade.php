@extends('layout.mahasiswadashboard')
@section('title', 'Profil')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto mt-10">
        <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800">Profil</h1>

        @if ($mahasiswa)
            <div class="space-y-4">
                <div class="flex justify-between border-b pb-2">
                    <strong class="text-gray-700 w-1/3">Nama Mahasiswa :</strong>
                    <span class="text-gray-600 w-2/3">{{ $mahasiswa->nama_mahasiswa }}</span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <strong class="text-gray-700 w-1/3">NIM :</strong>
                    <span class="text-gray-600 w-2/3">{{ $mahasiswa->nim }}</span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <strong class="text-gray-700 w-1/3">Fakultas :</strong>
                    <span class="text-gray-600 w-2/3">{{ $mahasiswa->fakultas }}</span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <strong class="text-gray-700 w-1/3">Program Studi :</strong>
                    <span class="text-gray-600 w-2/3">{{ $mahasiswa->program_studi }}</span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <strong class="text-gray-700 w-1/3">No. Telepon :</strong>
                    <span class="text-gray-600 w-2/3">{{ $mahasiswa->no_telp }}</span>
                </div>

                @php
                    $latestRequest = $mahasiswa->requestEdits()->latest()->first();
                @endphp

                @if ($latestRequestEdit)
                    @if ($latestRequestEdit->status == 'pending')
                        <div class="text-center mt-6">
                            <p class="text-yellow-500">Permintaan edit data sedang diproses.</p>
                        </div>
                    @elseif ($latestRequestEdit->status == 'approved')
                        <div class="text-center mt-6" id="success-message">
                            <p class="text-green-500">Data berhasil diubah pada
                                {{ $latestRequestEdit->updated_at->format('d M Y H:i') }}.</p>
                        </div>
                    @elseif ($latestRequestEdit->status == 'rejected')
                        <div class="text-center mt-6">
                            <p class="text-red-500">Permintaan edit data ditolak pada
                                {{ $latestRequestEdit->updated_at->format('d M Y H:i') }}. Silakan ajukan kembali.</p>
                        </div>
                    @endif
                @endif

                <!-- Tampilkan form hanya jika tidak ada permintaan edit yang sedang diproses -->
                @if (!$latestRequest || $latestRequest->status != 'pending')
                    <div class="text-center mt-6">
                        <form action="{{ route('mahasiswa.request_edit.submit', $mahasiswa->id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="field_to_edit" class="block text-gray-700">Pilih Data yang Ingin Diedit:</label>
                                <select name="field_to_edit" id="field_to_edit"
                                    class="border rounded w-full py-2 px-3 text-gray-700" required>
                                    <option value="nama_mahasiswa">Nama Mahasiswa</option>
                                    <option value="nim">NIM</option>
                                    <option value="fakultas">Fakultas</option>
                                    <option value="program_studi">Program Studi</option>
                                    <option value="no_telp">No. Telepon</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="new_value" class="block text-gray-700">Data Baru:</label>
                                <input type="text" name="new_value" id="new_value"
                                    class="border rounded w-full py-2 px-3 text-gray-700" required>
                            </div>

                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Ajukan Permintaan Edit Data
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        @else
            <p class="text-red-500">Data mahasiswa tidak ditemukan.</p>
        @endif
    </div>
@endsection
