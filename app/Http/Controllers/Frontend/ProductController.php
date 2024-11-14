<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function list()
    // {
    //     return view('frontend.pages.list');
    // }

    // public function detail()
    // {
    //     return view('frontend.pages.detail');
    // }

    public function product($slug = null)
    {
        if ($slug) {
            return view('frontend.pages.product.detail', compact('slug'));
        }

        return view('frontend.pages.product.list', compact('slug'));
    }
}
