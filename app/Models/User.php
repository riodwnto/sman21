<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    
     protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    public $incrementing = false;

    public static function deleteImage($id) {
        $id = User::where('id', $id)->get();

        $count = count($id);

        if ($count != null) {
            $img = (String) $id[0] -> images;
            $filepath = public_path('/img/'.$img);
            if (file_exists($filepath)) {
                // unlink($filepath);
            }
        }
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Generate Automatic ID : Activity
    public static function generateID() {
        $id = User::selectRaw('RIGHT (id, 3) AS id')->orderBy('id', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "ADM-00".$f;
        } else {
            $final = "ADM-001";
        }

        return $final;
    }
}
