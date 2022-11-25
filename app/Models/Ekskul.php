<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;

    protected $table = 'ekskul';

    protected $fillable = [
        'judul',
        'foto',
    ];

    public static function deleteImage($id) {
        $id = Ekskul::where('id_ekskul', $id)->get();

        $count = count($id);

        if ($count != null) {
            $img = (String) $id[0] -> images;
            $filepath = public_path('/img/ekskul/'.$img);
            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }
    }
}
