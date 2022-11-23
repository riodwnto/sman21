<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'isi',
        'sampul',
        'url_slug'
    ];

    public static function deleteImage($id) {
        $id = Berita::where('id_berita', $id)->get();

        $count = count($id);

        if ($count != null) {
            $img = (String) $id[0] -> sampul;
            $filepath = public_path('/img/berita/'.$img);
            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }
    }

    //Generate Automatic ID : Activity
    public static function generateID() {
        $id = Berita::selectRaw('RIGHT (id_berita, 3) AS id_berita')->orderBy('id_berita', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_berita;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "BR-00".$f;
        } else {
            $final = "BR-001";
        }

        return $final;
    }

    //Create Slug URL
    public static function generateSlug($param) {
        $list_delete = array(',', '<', '>', '?', '/', ';', ':', '"', '{', '[', '}', ']', '_', '=', '+', ')', '(', '*', '&', '^', '%', '$', '#', '@', '!', '~', '`', '.');
        $list = array(' ');
        $url_slug = str_replace($list, '-', strtolower($param));
        $url_slug_final = str_replace($list_delete, '', strtolower($url_slug));

        return $url_slug_final;
    }
}
