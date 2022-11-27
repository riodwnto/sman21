<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'dirgu';
    protected $primaryKey = 'id_guru';
    protected $keyType = 'string';

    protected $fillable = [
        'id_guru',
        'nip',
        'nama',
        'matpel',
        'foto'
    ];
    
    public $incrementing = false;
    // public $timestamps = false;

    // public static function vguru() {
    //     $query = DB::table('vguru');
    //     return $query;
    // }

    // public static function pendidikan_dosen() {
    //     $query = DB::table('pendidikan_dosen');
    //     return $query;
    // }

    // public static function publikasi_dosen() {
    //     $query = DB::table('publikasi_dosen');
    //     return $query;
    // }

    // public static function referensi_dosen() {
    //     $query = DB::table('referensi_dosen');
    //     return $query;
    // }

    public static function deleteImage($id) {
        $id = Dosen::where('nidn', $id)->get();

        $count = count($id);

        if ($count != null) {
            $img = (String) $id[0] -> images;
            $filepath = public_path('/img/'.$img);
            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }
    }

    //Generate Automatic ID : Activity
    public static function generateID() {
        $id = Guru::selectRaw('RIGHT (id_guru, 3) AS id_guru')->orderBy('id_guru', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_guru;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "GR-00".$f;
        } else {
            $final = "GR-001";
        }

        return $final;
    }
}
