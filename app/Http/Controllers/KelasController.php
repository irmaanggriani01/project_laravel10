<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // READ - Tampilkan semua kelas
    public function index()
    {
        // Mengambil semua data dari tabel 'kelas' dan mengirim ke view 'kelas.index'
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    // CREATE - Form untuk menambahkan kelas baru
    public function create()
    {
        // Mengembalikan view untuk menambah kelas
        return view('kelas.create');
    }

    // STORE - Simpan kelas baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kelas' => 'required|unique:kelas,kelas', // Nama kelas harus unik
            'ruangan' => 'required',
            'lantai' => 'required',
        ]);

        // Simpan data kelas baru ke database
        Kelas::create([
            'kelas' => $request->kelas,
            'ruangan' => $request->ruangan,
            'lantai' => $request->lantai,
        ]);

        // Redirect ke halaman index kelas dengan pesan sukses
        return redirect()->route('kelas.index')->with('success', 'Kelas created successfully.');
    }

    // EDIT - Form untuk mengedit kelas
    public function edit(Kelas $kelas)
    {
        // Mengembalikan view untuk mengedit kelas dengan data kelas yang diambil
        return view('kelas.edit', compact('kelas'));
    }

    // UPDATE - Update kelas di database
    public function update(Request $request, Kelas $kelas)
    {
        // Validasi input. Pada saat update, kelas yang sedang diedit diabaikan dari pengecekan unikitas.
        $request->validate([
            'kelas' => 'required|unique:kelas,kelas,' . $kelas->id, // Mengabaikan ID kelas yang sedang diedit
            'ruangan' => 'required',
            'lantai' => 'required',
        ]);

        // Update data kelas di database
        $kelas->update($request->only(['kelas', 'ruangan', 'lantai']));

        // Redirect ke halaman index kelas dengan pesan sukses
        return redirect()->route('kelas.index')->with('success', 'Kelas updated successfully.');
    }

    // DELETE - Hapus kelas
    public function destroy(Kelas $kelas)
    {
        // Hapus kelas dari database
        $kelas->delete();

        // Redirect ke halaman index kelas dengan pesan sukses
        return redirect()->route('kelas.index')->with('success', 'Kelas deleted successfully.');
    }
}
