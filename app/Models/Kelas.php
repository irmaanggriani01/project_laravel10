<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['kelas', 'ruangan', 'lantai']; // Pastikan menggunakan nama kolom yang sesuai

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class); // Asumsikan relasi antara Kelas dan Mahasiswa
    }
}
