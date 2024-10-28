<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; // Nama tabel mahasiswa

    protected $fillable = [
        'id',        // Referensi ke user_id
        'nama_mahasiswa', // Nama mahasiswa
        'nim',            // Nomor Induk Mahasiswa
        'fakultas',       // Fakultas
        'program_studi',  // Program studi
        'no_telp',        // Nomor Telepon
        'dosen_wali',
        'peran',          // Peran (misalnya mahasiswa)
        'aksi'            // Tindakan (untuk status atau kategori lain)
    ];

    public function plotting()
    {
        return $this->hasMany(Plotting::class, 'mahasiswa_id'); // Relasi hasMany ke model Plotting
    }

    // Relasi ke model User (Dosen Wali)
    public function dosenWali()
    {
        return $this->belongsTo(User::class, 'dosen_wali'); // Menyambung ke kolom 'wali_dosen'
    }

    // Relasi ke model User (Mahasiswa)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Menggunakan user_id untuk relasi mahasiswa
    }

    public function requestEdits()
    {
        return $this->hasMany(RequestEdit::class, 'mahasiswa_id');
    }
}
