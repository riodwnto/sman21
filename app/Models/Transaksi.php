<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';
    protected $fillable = ['transaksi_id','transaksi_kode','transaksi_tanggalpinjam','transaksi_tanggalkembali','transaksi_status','transaksi_denda','siswa_id'];

    public static function getAll() {
    	$sql	=  DB::table('transaksi')
		            ->join('siswa', 'transaksi.siswa_id', '=', 'siswa.siswa_id')
		            ->select('transaksi.*', 'siswa.*')
		            ->get();	

		return $sql;
    }

    public static function getById($id) {
    	$sql	=  DB::table('transaksi')
		            ->join('siswa', 'transaksi.siswa_id', '=', 'siswa.siswa_id')
		            ->select('transaksi.*', 'siswa.*')
		            ->where('transaksi_kode', '=', $id)
		            ->get();	

		return $sql;
    }

    public static function UpdateId($id){
        $sql = DB::table('transaksi')
              ->where('transaksi_kode', $id)
              ->update(['transaksi_status' => "Dikembalikan"]);

        return $sql;
    }

}
