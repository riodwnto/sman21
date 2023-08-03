<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $table = 'detailtransaksi';
    protected $primaryKey = 'detailtransaksi_id';
    protected $fillable = ['detailtransaksi_id','transaksi_id','buku_id','detailtransaksi_jumlah','detailtransaksi_tglpinjam','detailtransaksi_tglkembali','detailtransaksi_status'];

    public static function getById($id) {
    	$sql	=  DB::table('detailtransaksi')
		            ->join('transaksi', 'detailtransaksi.transaksi_id', '=', 'transaksi.transaksi_kode')
		            ->join('buku', 'detailtransaksi.buku_id', '=', 'buku.buku_kode')
		            ->select('detailtransaksi.*','transaksi.*', 'buku.*')
		            ->where('detailtransaksi.transaksi_id', '=' , $id)
		            ->get();	

		return $sql;
    }

    public static function UpdateId($id){
        $sql = DB::table('detailtransaksi')
              ->where('transaksi_id', $id)
              ->update(['detailtransaksi_status' => "Dikembalikan"]);
        return $sql;
    }

    public static function UpdateIdDt($id){
        $sql = DB::table('detailtransaksi')
              ->where('detailtransaksi_id', $id)
              ->update(['detailtransaksi_status' => "Dikembalikan"]);
        return $sql;
    }

    public static function GetIdTr($id){
        $sql    =  DB::table('detailtransaksi')
                ->join('transaksi', 'detailtransaksi.transaksi_id', '=', 'transaksi.transaksi_kode')
                ->join('buku', 'detailtransaksi.buku_id', '=', 'buku.buku_kode')
                ->select('detailtransaksi.*','transaksi.*', 'buku.*')
                ->where([['detailtransaksi.transaksi_id', '=' , $id],['detailtransaksi_status','=','Dipinjam']])
                ->get();    
        return $sql;
    }
}
