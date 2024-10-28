<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User; // Pastikan model User diimpor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // READ - Tampilkan semua post
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    // CREATE - Form untuk menambahkan post baru
    public function create()
    {
        // Ambil semua dosen dan dosen wali dari database
        $dosen = User::whereIn('role', ['dosen_biasa', 'dosen_wali'])->pluck('name');
        return view('post.create', compact('dosen')); // Pastikan mengarah ke view yang benar
    }

    // STORE - Simpan post baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen' => 'required|unique:post,nama_dosen',
            'nip' => 'required|unique:post,nip',
            'fakultas' => 'required',
            'matakuliah' => 'required|unique:post,matakuliah',
            'no_telp' => 'required',
            'peran' => 'required|unique:post,peran',
        ]);

        // Hitung jumlah dosen wali dan dosen biasa yang sudah ada
        $dosenWaliCount = Post::where('peran', 'Dosen Wali')->count();
        $dosenBiasaCount = Post::where('peran', 'Dosen')->count();

        // Cek jumlah peran yang diizinkan
        if ($request->peran == 'Dosen Wali' && $dosenWaliCount >= 2) {
            return redirect()->back()->withErrors(['peran' => 'Jumlah Dosen Wali sudah mencapai batas maksimum (2).']);
        }

        if ($request->peran == 'Dosen' && $dosenBiasaCount >= 3) {
            return redirect()->back()->withErrors(['peran' => 'Jumlah Dosen Biasa sudah mencapai batas maksimum (3).']);
        }

        // Simpan data dosen
        Post::create($request->all());

        return redirect()->route('post.index')->with('success', 'Dosen created successfully.');
    }

    // EDIT - Form untuk mengedit post
    public function edit(Post $post)
    {
        // Ambil semua dosen dan dosen wali dari database
        $dosen = User::whereIn('role', ['dosen_biasa', 'dosen_wali'])->pluck('name');
        return view('post.edit', compact('post', 'dosen')); // Kirim variabel $dosen ke view
    }

    // UPDATE - Update post di database
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'nama_dosen' => 'required|unique:post,nama_dosen,' . $post->id,
            'nip' => 'required|unique:post,nip,' . $post->id,
            'fakultas' => 'required',
            'matakuliah' => 'required|unique:post,matakuliah,' . $post->id,
            'no_telp' => 'required',
            'peran' => 'required|unique:post,peran,' . $post->id,
        ]);

        // Hitung jumlah dosen wali dan dosen biasa yang sudah ada
        $dosenWaliCount = Post::where('peran', 'Dosen Wali')->count();
        $dosenBiasaCount = Post::where('peran', 'Dosen')->count();

        // Cek jika peran diubah
        if ($request->peran == 'Dosen Wali' && $dosenWaliCount >= 2 && $post->peran != 'Dosen Wali') {
            return redirect()->back()->withErrors(['peran' => 'Jumlah Dosen Wali sudah mencapai batas maksimum (2).']);
        }

        if ($request->peran == 'Dosen' && $dosenBiasaCount >= 3 && $post->peran != 'Dosen') {
            return redirect()->back()->withErrors(['peran' => 'Jumlah Dosen Biasa sudah mencapai batas maksimum (3).']);
        }

        // Update data dosen
        $post->update($request->all());

        return redirect()->route('post.index')->with('success', 'Dosen updated successfully.');
    }

    // DELETE - Hapus post
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Dosen deleted successfully.');
    }

    // PROFILE - Tampilkan profil dosen yang sedang login
    public function profile()
    {
        $dosen = Auth::user(); // Ambil user yang sedang login
        // Ambil data post berdasarkan peran
        $post = Post::where('peran', $dosen->name)->first(); // Menggunakan nama dosen untuk mencocokkan

        return view('post.profile', compact('post'));
    }

    public function show()
    {
        $post = Post::where('peran', Auth::user()->name)->firstOrFail();
        $jadwalPlotting = $post->plotting()
                           ->with(['kelas'])
                           ->select('kelas_id', 'hari', 'tanggal', 'waktu_mulai', 'waktu_selesai')
                           ->groupBy('kelas_id', 'hari', 'tanggal', 'waktu_mulai', 'waktu_selesai')
                           ->get();

        return view('post.jadwal', compact('jadwalPlotting'));
    }

}
