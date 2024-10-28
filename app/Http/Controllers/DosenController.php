<?php

namespace App\Http\Controllers;

use App\Models\RequestEdit;
use App\Models\Mahasiswa;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function dashboard()
    {
        return view('layout.dosendashboard');
    }

    public function dasbor()
    {
        return view('layout.dosendasbor');
    }

    public function index()
    {
        // Ambil permintaan edit dari database dengan status 'pending'
        $requests = RequestEdit::where('status', 'pending')->get();
        return view('dosen.index', compact('requests'));
    }

    public function approveRequest($id)
    {
        $requestEdit = RequestEdit::find($id);
        if (!$requestEdit) {
            return back()->with('error', 'Permintaan tidak ditemukan.');
        }

        // Update status request edit
        $requestEdit->update(['status' => 'approved']);
        $mahasiswa = Mahasiswa::find($requestEdit->mahasiswa_id);

        if ($mahasiswa) {
            $mahasiswa->{$requestEdit->field_to_edit} = $requestEdit->new_value;
            $mahasiswa->is_requesting_edit = false;
            $mahasiswa->save();
            return redirect()->route('mahasiswa.profile', ['id' => $mahasiswa->id])
                ->with('success', 'Permintaan edit data disetujui dan data telah diubah.');
        }

        return back()->with('error', 'Data mahasiswa tidak ditemukan.');
    }

    public function rejectRequest($id)
    {
        $requestEdit = RequestEdit::find($id);
        if (!$requestEdit) {
            return redirect()->back()->with('error', 'Permintaan edit tidak ditemukan.');
        }

        // Update status request edit menjadi 'rejected'
        $requestEdit->update(['status' => 'rejected']);
        $mahasiswa = Mahasiswa::find($requestEdit->mahasiswa_id);

        if ($mahasiswa) {
            $mahasiswa->is_requesting_edit = false; // Reset status
            $mahasiswa->save();
            return redirect()->route('mahasiswa.profile', ['id' => $requestEdit->mahasiswa_id])
                ->with('error', 'Permintaan edit data ditolak. Silakan ajukan kembali.');
        }

        return back()->with('error', 'Data mahasiswa tidak ditemukan.');
    }

    public function showRequestEdits()
    {
        $requestEdits = RequestEdit::whereHas('mahasiswa', function ($query) {
            $query->where('wali_dosen', Auth::user()->id);
        })->get();
        
        return view('post.request_edits', compact('requestEdits'));
    }

    // Consider moving validation rules to a separate method or using Form Requests
    private function validationRules(Request $request, Post $post = null)
    {
        return [
            'nama_dosen' => 'required|unique:post,nama_dosen' . ($post ? ',' . $post->id : ''),
            'nip' => 'required|unique:post,nip' . ($post ? ',' . $post->id : ''),
            'fakultas' => 'required',
            'matakuliah' => 'required',
            'no_telp' => 'required',
            'peran' => 'required',
        ];
    }
}
