<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Color;
use App\Models\SgoContact;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product($slug = null)
    {
        $totalCars = Car::count();
        $limit = 6;
        $maxPages = ceil($totalCars / $limit);

        if ($slug) {
            $product = Car::where('slug', $slug)->with('types', 'brands', 'carImages', 'color')->first();
            $contact = SgoContact::first();
            return view('frontend.pages.product.detail', compact('slug', 'product', 'totalCars', 'maxPages', 'contact'));
        }

        return view('frontend.pages.product.list', compact('slug'));
    }

    public function loadMoreCars(Request $request)
    {
        $offset = $request->offset ?? 0;
        $limit = 6;
        $products = Car::skip($offset)->take($limit)->get();
        $hasMore = Car::count() > ($offset + $limit);
        return response()->json([
            'products' => $products,
            'hasMore' => $hasMore,
        ]);
    }
}
