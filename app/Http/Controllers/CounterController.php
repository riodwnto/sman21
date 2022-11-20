<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counter;
use Illuminate\Support\Facades\Auth;

class CounterController extends Controller
{
    public static function visitorCount() {
        $ipaddress = '';
        $check = Auth::check();

        //dd($check);
        
        if ($check == false) {
            $now = date("Y-m-d", strtotime('now'));
            
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if(getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if(getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if(getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if(getenv('HTTP_FORWARDED'))
                $ipaddress = getenv('HTTP_FORWARDED');
            else if(getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';

            $query = Counter::where('ip_addr', $ipaddress)->where('date', $now)->get();

            if (count($query) == 0) {
                $query = Counter::insert([
                    'ip_addr'       => $ipaddress,
                    'date'          => date('Y/m/d'),
                    'count'         => 1
                ]);
            } else {
                $get_count = $query[0]->count;
                $counter = $get_count + 1;

                $query = Counter::where('ip_addr', $ipaddress)->where('date', $now)->update([
                    'date'          => date('Y-m-d'),
                    'count'         => $counter
                ]);
            }
        }
    }
}
