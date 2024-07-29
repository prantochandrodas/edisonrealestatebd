<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\BlogBanner;
use App\Models\BlogPost;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $socialLink=SocialLink::all();
        $application=Application::first();
        $banner = BlogBanner::first();
        $posts = BlogPost::paginate(2);
        return view('frontend.blogs.index', compact('socialLink','application','banner', 'posts'));
    }

    public function details($name)
    {
        $application=Application::first();
        $data = BlogPost::where('slug', $name)->firstOrFail();
        // Fetch the previous blog post
        $previous = BlogPost::where('id', '<', $data->id)->orderBy('id', 'desc')->first();

        // Fetch the next blog post
        $next = BlogPost::where('id', '>', $data->id)->orderBy('id', 'asc')->first();
        return view('frontend.blogs.details', compact('socialLink','application','data','previous','next'));
    }
}
