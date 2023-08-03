<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'siswa_id';
    protected $fillable = ['siswa_id','nisn','siswa_nama','siswa_ttl','siswa_gender','siswa_alamat'];
}
