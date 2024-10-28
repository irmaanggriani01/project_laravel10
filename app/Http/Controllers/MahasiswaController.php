<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\RequestEdit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('layout.mahasiswadashboard');
    }

    public function dasbor()
    {
        return view('layout.mahasiswadasbor');
    }

    public function index()
    {
        $mahasiswa = Mahasiswa::where('dosen_wali', Auth::user()->id)->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $allMahasiswa = User::where('role', 'mahasiswa')->get(['id', 'name']);
        return view('mahasiswa.create', compact('allMahasiswa'));
    }

    public function store(Request $request)
    {
        $countMahasiswa = Mahasiswa::where('dosen_wali', Auth::user()->id)->count();

        if ($countMahasiswa >= 10) {
            return redirect()->back()->withErrors('Anda sudah mencapai batas maksimum 10 mahasiswa.');
        }

        $rules = [
            'nama_mahasiswa' => 'required|unique:mahasiswa,nama_mahasiswa',
            'nim' => 'required|unique:mahasiswa,nim',
            'peran' => 'required',
        ];

        $request->validate($rules);

        $user = User::find($request->peran);

        if (!$user || $user->role !== 'mahasiswa') {
            return redirect()->back()->withErrors('User mahasiswa tidak ditemukan atau role tidak valid.');
        }

        if (Mahasiswa::where('peran', $user->name)->exists()) {
            return redirect()->back()->withErrors('Peran ini sudah digunakan oleh mahasiswa lain. Silakan pilih peran lain.');
        }

        Mahasiswa::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'peran' => $user->name,
            'dosen_wali' => Auth::user()->id,
            'fakultas' => $request->fakultas,
            'program_studi' => $request->program_studi,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa created successfully.');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $allMahasiswa = User::where('role', 'mahasiswa')->get(['id', 'name']);
        return view('mahasiswa.edit', compact('mahasiswa', 'allMahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $request->validate([
            'nama_mahasiswa' => 'required|unique:mahasiswa,nama_mahasiswa,' . $mahasiswa->id,
            'nim' => 'required|unique:mahasiswa,nim,' . $mahasiswa->id,
            'fakultas' => 'required',
            'program_studi' => 'required',
            'no_telp' => 'required',
            'peran' => 'required',
        ]);

        $user = User::find($request->peran);

        if (!$user || $user->role !== 'mahasiswa') {
            return redirect()->back()->withErrors('User mahasiswa tidak ditemukan atau role tidak valid.');
        }

        if (Auth::user()->id != $mahasiswa->dosen_wali) {
            return redirect()->route('mahasiswa.index')->withErrors('Anda tidak memiliki akses untuk mengedit mahasiswa ini.');
        }

        if (Mahasiswa::where('peran', $user->name)->where('id', '!=', $mahasiswa->id)->exists()) {
            return redirect()->back()->withErrors('Peran ini sudah digunakan oleh mahasiswa lain. Silakan pilih peran lain.');
        }

        $mahasiswa->update([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'fakultas' => $request->fakultas,
            'program_studi' => $request->program_studi,
            'no_telp' => $request->no_telp,
            'peran' => $user->name,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        if (Auth::user()->id != $mahasiswa->dosen_wali) {
            return redirect()->route('mahasiswa.index')->withErrors('Anda tidak memiliki akses untuk menghapus mahasiswa ini.');
        }

        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    public function profile()
    {
        $mahasiswa = Mahasiswa::where('peran', Auth::user()->name)->first();

        if (!$mahasiswa) {
            return redirect()->back()->withErrors('Data mahasiswa tidak ditemukan.');
        }

        // Ambil permintaan edit terbaru untuk ditampilkan di view
        $latestRequestEdit = $mahasiswa->requestEdits()->latest()->first();

        return view('mahasiswa.profile', compact('mahasiswa', 'latestRequestEdit'));
    }

    // Menampilkan form pengajuan request edit
    public function showRequestEditForm()
    {
        $mahasiswa = Mahasiswa::where('peran', Auth::user()->name)->first();

        if (!$mahasiswa) {
            return redirect()->back()->withErrors('Data mahasiswa tidak ditemukan.');
        }

        // Check if there is a pending request
        $pendingRequest = $mahasiswa->requestEdits()->where('status', 'pending')->first();

        if ($pendingRequest) {
            return redirect()->back()->withErrors('Anda memiliki permintaan edit yang sedang diproses.');
        }

        return view('mahasiswa.request_edit', compact('mahasiswa'));
    }

    // Mengirim request edit
    public function submitRequestEdit(Request $request, $id)
    {
        $validated = $request->validate([
            'field_to_edit' => 'required|string',
            'new_value' => 'required|string',
        ]);

        // Check if there is an ongoing request
        $existingRequest = RequestEdit::where('mahasiswa_id', $id)
            ->where('field_to_edit', $validated['field_to_edit'])
            ->where('status', 'pending')
            ->first();

        if ($existingRequest) {
            return redirect()->back()->withErrors('Permintaan edit ini sudah diajukan dan masih dalam proses.');
        }

        RequestEdit::create([
            'mahasiswa_id' => $id,
            'field_to_edit' => $validated['field_to_edit'],
            'new_value' => $validated['new_value'],
            'status' => 'pending', // Set status to pending
        ]);

        // Update mahasiswa status
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->is_requesting_edit = true;
        $mahasiswa->save();

        return redirect()->back()->with('success', 'Permintaan perubahan data telah diajukan.');
    }

    public function show()
    {
        // Mengambil data mahasiswa berdasarkan peran dari pengguna yang sedang login
        $mahasiswa = Mahasiswa::where('peran', Auth::user()->name)->firstOrFail();

        // Mengambil jadwal plotting yang terkait dengan mahasiswa tersebut
        $jadwalPlotting = $mahasiswa->plotting()->with(['post', 'kelas'])->get();

        // Mengarahkan ke view 'mahasiswa.jadwal' dengan data jadwal plotting
        return view('mahasiswa.jadwal', compact('jadwalPlotting'));
    }

}
