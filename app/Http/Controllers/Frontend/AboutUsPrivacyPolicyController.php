<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\PrivacyPolicy;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class AboutUsPrivacyPolicyController extends Controller
{
    public function index(){
        $socialLink=SocialLink::all();
        $data=PrivacyPolicy::first();
        $application=Application::first();
        return view('frontend.about_us.privacy_policy',compact('socialLink','application','data'));
    }
}
