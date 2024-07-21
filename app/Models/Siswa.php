<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = ['nis', 'nama', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'id_kota'];
}
