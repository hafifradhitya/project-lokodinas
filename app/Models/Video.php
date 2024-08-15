<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_video';
    protected $table = 'video';
    protected $fillable = ['jdl_video', 'video_seo', 'username', 'keterangan', 'tanggal', 'jam', 'hari', 'gbr_video', 'youtube', 'tagvid', 'tanggal'];

    public function playlist(){
        return $this->belongsTo(Playlistvideo::class,"id_playlist","id");
    }
}
