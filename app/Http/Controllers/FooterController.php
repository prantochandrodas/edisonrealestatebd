<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index(){
        $data=Application::first();
        return view('frontend.partials._footer',compact('data'));
    }
}
