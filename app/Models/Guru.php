<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'nidn';
    protected $keyType = 'string';

    protected $fillable = [
        'nidn',
        'nama_dosen',
        'keahlian',
        'foto',
        's1',
        's2',
        's3',
        'data_publikasi',
        'google_scholar',
        'shinta',
        'scopus',
    ];
    
    public $incrementing = false;
    public $timestamps = false;

    public static function vdosen() {
        $query = DB::table('vdosen');
        return $query;
    }

    public static function pendidikan_dosen() {
        $query = DB::table('pendidikan_dosen');
        return $query;
    }

    public static function publikasi_dosen() {
        $query = DB::table('publikasi_dosen');
        return $query;
    }

    public static function referensi_dosen() {
        $query = DB::table('referensi_dosen');
        return $query;
    }

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
}
