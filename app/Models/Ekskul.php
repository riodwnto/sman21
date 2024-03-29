<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ekskul extends Model
{
    use HasFactory;

    protected $table = 'ekskul';
    protected $primaryKey = 'id_ekskul';
    protected $keyType = 'string';

    protected $fillable = [
        'id_ekskul',
        'judul',
        'foto'
    ];
    
    public $incrementing = false;

    public static function deleteImage($id) {
        $id = Ekskul::where('id_ekskul', $id)->get();

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
        $id = Ekskul::selectRaw('RIGHT (id_ekskul, 3) AS id_ekskul')->orderBy('id_ekskul', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_ekskul;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "EKS-00".$f;
        } else {
            $final = "EKS-001";
        }

        return $final;
    }
}
