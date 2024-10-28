<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
//use App\Models\Mahasiswa;

class DosenBiasaController extends Controller
{
    public function index()
    {
        // Mengembalikan view dashboard dosen biasa
        return view('layout.dosenbiasadashboard');
    }

    public function profile()
    {
        $dosen = Auth::user(); // Ambil user yang sedang login
        // Ambil data post berdasarkan peran
        $post = Post::where('peran', $dosen->name)->first(); // Menggunakan nama dosen untuk mencocokkan

        return view('dosen_biasa.profile', compact('post'));
    }

    public function show()
    {
        $post = Post::where('peran', Auth::user()->name)->firstOrFail();
        $jadwalPlotting = $post->plotting()
            ->with(['kelas'])
            ->select('kelas_id', 'hari', 'tanggal', 'waktu_mulai', 'waktu_selesai')
            ->groupBy('kelas_id', 'hari', 'tanggal', 'waktu_mulai', 'waktu_selesai')
            ->get();

        return view('dosen_biasa.jadwal', compact('jadwalPlotting'));
    }

    public function dasbor()
    {

        return view('layout.dosenbiasadasbor');
    }


}
