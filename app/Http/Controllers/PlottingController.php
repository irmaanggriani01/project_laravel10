<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Plotting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 

class PlottingController extends Controller
{
    public function index()
    {
        $plotting = Plotting::with(['mahasiswa', 'post', 'kelas'])->paginate(5); // Retrieve plotting data with relationships
        return view('plotting.index', compact('plotting'));
    }

    public function create()
    {
        $mahasiswaList = Mahasiswa::all();
        $postList = Post::all(); // Ambil semua dosen, tidak perlu eager loading lagi
        $kelasList = Kelas::all();

        return view('plotting.create', compact('mahasiswaList', 'postList', 'kelasList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'post_id' => 'required|exists:post,id',
            'kelas_id' => 'required|exists:kelas,id',
            'hari' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            // Validasi unik untuk kombinasi mahasiswa_id, post_id, kelas_id, hari, dan tanggal
            Rule::unique('plottings')->where(function ($query) use ($request) {
                return $query->where('mahasiswa_id', $request->mahasiswa_id)
                    ->where('post_id', $request->post_id)
                    ->where('kelas_id', $request->kelas_id)
                    ->where('hari', $request->hari)
                    ->where('tanggal', $request->tanggal);
            }),
        ]);

        // Create a new plotting record
        Plotting::create($request->all());

        return redirect()->route('plotting.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $plotting = Plotting::findOrFail($id);
        $plotting->delete();

        return redirect()->route('plotting.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
