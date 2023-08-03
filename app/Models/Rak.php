<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;
    protected $table = 'rak';
    protected $primaryKey = 'rak_id';
    protected $fillable = ['rak_id','rak_nama','rak_lokasi'];
}
