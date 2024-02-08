<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Track;

class GuestController extends Controller
{
    public function welcome (){
        $artists = Artist::paginate(20);
        $tracks = Track::paginate(20);
        return view('welcome',compact('tracks','artists'));
    }
}
