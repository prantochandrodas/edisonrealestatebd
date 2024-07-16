<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogBanner;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $banner = BlogBanner::first();
        $posts = BlogPost::all();
        return view('frontend.blogs.index', compact('banner', 'posts'));
    }

    public function details($name)
    {

        $data = BlogPost::where('slug', $name)->firstOrFail();
        // Fetch the previous blog post
        $previous = BlogPost::where('id', '<', $data->id)->orderBy('id', 'desc')->first();

        // Fetch the next blog post
        $next = BlogPost::where('id', '>', $data->id)->orderBy('id', 'asc')->first();
        return view('frontend.blogs.details', compact('data','previous','next'));
    }
}
