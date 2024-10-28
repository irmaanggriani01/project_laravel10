@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Permintaan Edit Data Mahasiswa</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>Field yang Diubah</th>
                <th>Nilai Baru</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requestEdits as $edit)
            <tr>
                <td>{{ $edit->mahasiswa->nama_mahasiswa }}</td>
                <td>{{ ucfirst($edit->field_to_edit) }}</td>
                <td>{{ $edit->new_value }}</td>
                <td>
                    <!-- Tindakan approve atau reject -->
                    <form action="{{ route('dosen.approveRequest', $edit->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('dosen.rejectRequest', $edit->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
