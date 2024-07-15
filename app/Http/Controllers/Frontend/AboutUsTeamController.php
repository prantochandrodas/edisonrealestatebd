<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DreamTeam;
use Illuminate\Http\Request;
use App\Models\Team;
class AboutUsTeamController extends Controller
{
    public function index(){
        $teams=Team::all();
        $dreamTeam=DreamTeam::first();
        return view('frontend.about_us.team',compact('teams','dreamTeam'));
    }
}
