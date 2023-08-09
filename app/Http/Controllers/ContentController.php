<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    //
    public function index()
    {
    	$data 	= [
    	'content'		=> Content::get(),
    	'title' 	=> 'Data Master Menu',
    	'menu' 		=> 'content',
    	];
        
        return view('admin.content', $data);
    }
}
