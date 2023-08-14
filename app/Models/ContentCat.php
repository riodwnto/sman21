<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentCat extends Model
{
    use HasFactory;
    protected $table = 'contentcat';
    protected $primaryKey = 'contentcat_id';
    protected $fillable = ['contentcat_nama','contentcat_status'];
}
