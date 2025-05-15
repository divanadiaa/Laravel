<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_bookmark';
    
    protected $fillable = [
        'id_pengguna',
        'id_tempat_kursus',
        'created_at',
    ];
    
    // Relasi dengan PENGGUNA
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }
    
    // Relasi dengan TEMPAT_KURSUS
    public function tempatKursus()
    {
        return $this->belongsTo(TempatKursus::class, 'id_tempat_kursus', 'id_tempat_kursus');
    }
}