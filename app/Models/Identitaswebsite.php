<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identitaswebsite extends Model
{
    use HasFactory;

    protected $table = 'identitas';
    protected $fillable = ['nama_website','email','url','facebook','rekening','no_telp','meta_deskripsi','meta_keyword','favicon','maps'];
}
