<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = 'content';
    protected $primaryKey = 'content_id';
    protected $fillable = ['content_img','content_judul','content_deskripsi','content_kategori','content_url','content_status'];
}
