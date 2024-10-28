<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah kredensial valid
        if (Auth::attempt($request->only('email', 'password'))) {
            $role = Auth::user()->role;
            $userName = Auth::user()->name; // Ambil nama pengguna untuk cek mahasiswa

            // Cek role Kaprodi
            if ($role === 'kaprodi') {
                return redirect()->route('layout.kaprodidasbor');  // Route Kaprodi ke halaman layout.app
            }

            // Cek role Dosen Wali
            elseif ($role === 'dosen_wali') {
                return redirect()->route('layout.dosendashboard');  // Route Dosen Wali ke halaman mahasiswa.index
            }

            // Cek role Dosen Biasa
            elseif ($role === 'dosen_biasa') {
                return redirect()->route('layout.dosenbiasadashboard');  // Route Dosen Biasa ke halaman mahasiswa.index
            }

            // Cek role Mahasiswa
            elseif ($role === 'mahasiswa') {
                $mahasiswaNames = [
                    'Mahasiswa 1',
                    'Mahasiswa 2',
                    'Mahasiswa 3',
                    'Mahasiswa 4',
                    'Mahasiswa 5',
                    'Mahasiswa 6',
                    'Mahasiswa 7',
                    'Mahasiswa 8',
                    'Mahasiswa 9',
                    'Mahasiswa 10',
                    'Mahasiswa 11',
                    'Mahasiswa 12',
                    'Mahasiswa 13',
                    'Mahasiswa 14',
                    'Mahasiswa 15',
                    'Mahasiswa 16',
                    'Mahasiswa 17',
                    'Mahasiswa 18',
                    'Mahasiswa 19',
                    'Mahasiswa 20'
                ];

                // Cek apakah nama pengguna adalah salah satu mahasiswa
                if (in_array($userName, $mahasiswaNames)) {
                    return redirect()->route('layout.mahasiswadashboard'); // Pastikan route ini ada
                }
            }


            // Jika tidak cocok dengan role yang diinginkan, logout
            Auth::logout();
            return back()->withErrors([
                'email' => 'Anda tidak memiliki akses sebagai Kaprodi, Dosen Wali, atau Mahasiswa.',
            ]);
        }

        // Jika kredensial tidak cocok
        return back()->withErrors([
            'email' => 'Email tidak terdaftar.',
        ]);
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');  // Arahkan ke halaman login setelah logout
    }
}
