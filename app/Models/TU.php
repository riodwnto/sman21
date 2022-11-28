<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TU extends Model
{
    use HasFactory;

    protected $table = 'dirtu';
    protected $primaryKey = 'id_tu';
    protected $keyType = 'string';

    protected $fillable = [
        'id_tu',
        'nip',
        'nama',
        'bagian',
        'foto'
    ];
    
    public $incrementing = false;

    public static function deleteImage($id) {
        $id = TU::where('id_tu', $id)->get();

        $count = count($id);

        if ($count != null) {
            $img = (String) $id[0] -> images;
            $filepath = public_path('/img/'.$img);
            if (file_exists($filepath)) {
                // unlink($filepath);
            }
        }
    }

    //Generate Automatic ID : Activity
    public static function generateID() {
        $id = TU::selectRaw('RIGHT (id_tu, 3) AS id_tu')->orderBy('id_tu', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_tu;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "TU-00".$f;
        } else {
            $final = "TU-001";
        }

        return $final;
    }
}
