<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function blog($slug = null)
    {
        if ($slug) {
            return view('frontend.pages.blog.detail', compact('slug'));
        }

        return view('frontend.pages.blog.list', compact('slug'));
    }
}
