<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = ['id_berita', 'id_kategori', 'judul', 'tanggal', 'status']; // Kolom yang dapat diisi

    public function scopeLatest($query)
    {
        return $query->orderBy('tanggal', 'desc');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'id_tag', 'id_tag');
    }
}
