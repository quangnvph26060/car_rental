<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Color;
use App\Models\Type;
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
            $product = Car::where('slug', $slug)->with('types', 'brands', 'carImages', 'color')->first();

            return view('frontend.pages.product.detail', compact('slug', 'product'));
        }

        return view('frontend.pages.product.list', compact('slug'));
    }
}
