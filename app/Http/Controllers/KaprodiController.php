<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa; // Pastikan model Mahasiswa diimport
use Illuminate\Http\Request;

class KaprodiController extends Controller
{
    // Metode untuk menampilkan dashboard Kaprodi
    public function dashboard()
    {
        return view('layout.kaprodidasbor');
    }

    // Metode untuk menampilkan data mahasiswa
    public function mahasiswa()
    {
        // Ambil data mahasiswa dengan pagination
        $mahasiswa = Mahasiswa::paginate(8); // Sesuaikan jumlah item per halaman

        // Kirim data ke view
        return view('kaprodi.mahasiswa', compact('mahasiswa'));
    }
}
