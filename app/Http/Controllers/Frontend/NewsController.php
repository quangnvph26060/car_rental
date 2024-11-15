<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function blog($slug = null)
    {
        if ($slug) {
            $post = Post::where('slug', $slug)->first();
            // dd($post);
            return view('frontend.pages.blog.detail', compact('slug', 'post'));
        }

        return view('frontend.pages.blog.list', compact('slug'));
    }
}
