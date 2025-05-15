<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_review';
    
    protected $fillable = [
        'rating',
        'comment',
        'created_at',
        'id_pengguna',
        'id_tempat_kursus',
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