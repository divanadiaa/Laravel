<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatKursus extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tempat_kursus';
    
    protected $fillable = [
        'gambar',
        'nama_tempat_kursus',
        'deskripsi_tempat_kursus',
        'lokasi',
        'maps',
        'kontak_kursus',
    ];
    
    // Relasi dengan PROGRAM_KURSUS
    public function programKursus()
    {
        return $this->hasMany(ProgramKursus::class, 'id_tempat_kursus', 'id_tempat_kursus');
    }
    
    // Relasi dengan BOOKMARK
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'id_tempat_kursus', 'id_tempat_kursus');
    }
    
    // Relasi dengan REVIEW
    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_tempat_kursus', 'id_tempat_kursus');
    }
}