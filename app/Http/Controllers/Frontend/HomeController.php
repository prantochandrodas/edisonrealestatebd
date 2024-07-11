<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUsInformation;
use App\Models\slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders=slider::all();
        $aboutCompanyInformation=AboutUsInformation::first();
        return view('frontend.home.index',compact('sliders','aboutCompanyInformation'));
    }

    
}
