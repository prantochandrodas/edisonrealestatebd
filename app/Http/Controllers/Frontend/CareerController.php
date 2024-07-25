<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CareerBanner;
use App\Models\CareerDescription;
use App\Models\CareerJobPost;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $banner=CareerBanner::first();
        $description=CareerDescription::first();
        $jobpost=CareerJobPost::all();
        return view('frontend.careers.index',compact('banner','description','jobpost'));
    }
}
