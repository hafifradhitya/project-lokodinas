<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iklansidebar extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_iklanatas';
    protected $table = 'iklanatas';
    protected $fillable = ['id_iklanatas', 'judul', 'username', 'url', 'gambar', 'tgl_posting']; // Kolom yang dapat diisi
}
