<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'buku_id';
    protected $fillable = ['buku_id','buku_judul','buku_kode','buku_penulis','buku_penerbit','buku_tahunterbit','buku_stok','buku_sinopsis','jenis_id','rak_id','buku_qrcode'];

    public static function getAll() {
    	$sql	=  DB::table('buku')
		            ->join('jenis', 'buku.jenis_id', '=', 'jenis.id_jenis')
                    ->join('rak', 'buku.rak_id', '=', 'rak.rak_id')
		            ->select('buku.*', 'jenis.*','rak.*')
		            ->get();	

		return $sql;
    }
     public static function getById($id) {
    	$sql	=  DB::table('buku')
		            ->join('jenis', 'buku.jenis_id', '=', 'jenis.id_jenis')
		            ->join('rak', 'buku.rak_id', '=', 'rak.rak_id')
                    ->select('buku.*', 'jenis.*','rak.*')
                    ->where('buku_kode', '=',$id)       
		            ->get();	

		return $sql;
    }
}
