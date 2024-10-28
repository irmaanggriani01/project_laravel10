<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestEdit extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'field_to_edit',
        'new_value',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
