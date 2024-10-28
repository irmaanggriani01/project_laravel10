<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable = [
        'no', 
        'nama_dosen', 
        'nip', 
        'fakultas', 
        'matakuliah', 
        'no_telp', 
        'peran', 
        'aksi'
    ];

    public $timestamps = false;

    public function plotting()
    {
        return $this->hasMany(Plotting::class); // Ganti 'Plotting' dengan model yang sesuai
    }

    // Contoh relasi
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_dosen', 'id');
    }

    // Contoh accessor
    public function getFormattedNoTelpAttribute()
    {
        return '+62 ' . $this->attributes['no_telp'];
    }
}
