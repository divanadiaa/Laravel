<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pengguna';
    
    protected $fillable = [
        'nama',
        'email',
        'password',
    ];
    
    // Relasi dengan BOOKMARK
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'id_pengguna', 'id_pengguna');
    }
    
    // Relasi dengan REVIEW
    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_pengguna', 'id_pengguna');
    }
}