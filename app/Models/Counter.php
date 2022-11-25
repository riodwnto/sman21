<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    protected $table = 'counter';
    protected $primaryKey = '';
    
    public $incrementing = false;
    public $timestamps = false;

    public static function getCounterData() {
        $mon = date("Y-m-d", strtotime('monday this week'));
        $tue = date("Y-m-d", strtotime('tuesday this week'));
        $wed = date("Y-m-d", strtotime('wednesday this week'));
        $thu = date("Y-m-d", strtotime('thursday this week'));
        $fri = date("Y-m-d", strtotime('friday this week'));
        $sat = date("Y-m-d", strtotime('saturday this week'));
        $sun = date("Y-m-d", strtotime("sunday this week"));

        $query = Counter::whereBetween('date', [$mon, $sun])->get();

        $query1 = Counter::where('date', $mon)->count();
        $query2 = Counter::where('date', $tue)->count();
        $query3 = Counter::where('date', $wed)->count();
        $query4 = Counter::where('date', $thu)->count();
        $query5 = Counter::where('date', $fri)->count();
        $query6 = Counter::where('date', $sat)->count();
        $query7 = Counter::where('date', $sun)->count();

        $result = [$query, $query1, $query2, $query3, $query4, $query5, $query6, $query7];
        //dd($result);
        return $result;
    }
}
