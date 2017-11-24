<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Album;

class StaticPagesController extends Controller
{
    //home
    public function home(){
    	// get all albums
    	$albums = Album::all();

    	// return
    	return view('home' , compact('albums'));
    }
}
