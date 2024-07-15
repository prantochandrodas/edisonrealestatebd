<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class AboutUsPrivacyPolicyController extends Controller
{
    public function index(){
        $data=PrivacyPolicy::first();
        return view('frontend.about_us.privacy_policy',compact('data'));
    }
}
