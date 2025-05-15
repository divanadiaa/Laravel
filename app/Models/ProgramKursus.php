<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKursus extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_program';
    
    protected $fillable = [
        'nama_program',
        'durasi',
        'range_biaya',
        'id_tempat_kursus',
    ];
    
    // Relasi dengan TEMPAT_KURSUS
    public function tempatKursus()
    {
        return $this->belongsTo(TempatKursus::class, 'id_tempat_kursus', 'id_tempat_kursus');
    }
}