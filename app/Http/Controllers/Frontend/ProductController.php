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
        $totalCars = Car::count(); // Đếm tổng số xe
        $limit = 6; // Số xe mỗi trang
        $maxPages = ceil($totalCars / $limit);

        if ($slug) {
            $product = Car::where('slug', $slug)->with('types', 'brands', 'carImages', 'color')->first();
            return view('frontend.pages.product.detail', compact('slug', 'product' , 'totalCars', 'maxPages'));
        }

        return view('frontend.pages.product.list', compact('slug'));
    }

    public function loadMoreCars(Request $request)
    {
        $page = $request->get('page', 1);
        $limit = 6;

        $cars = Car::orderBy('created_at', 'desc')->skip(($page - 1) * $limit)->take($limit)->get();


        return response()->json($cars);
    }
}
