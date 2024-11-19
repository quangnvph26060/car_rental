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
            $productFavorite = Car::where('status', 1)->where('is_favorite', 1)->take(6)->get();
            return view('frontend.pages.product.detail', compact('slug', 'product', 'totalCars', 'maxPages', 'contact', 'productFavorite'));
        }

        return view('frontend.pages.product.list', compact('slug'));
    }

    public function loadMoreCarBySlug(Request $request)
    {
        $slug = $request->slug;
        $types = Type::where('slug', $slug)->first();
        $brands = Brand::where('slug', $slug)->first();
        if ($types) {
            $cars = $types->cars()->where('status', 1); 
        } elseif ($brands) {
            $cars = $brands->cars()->where('status', 1); 
        }
        $perPage = 6;
        $page = $request->input('page', 2); 
        $offset = ($page - 1) * $perPage;
        $totalCars = $cars->count();
        $listCars = $cars->skip($offset)->take($perPage)->get();
        // dd($listCars);
        $hasMore = $totalCars > ($offset + $perPage);

        return response()->json([
            'cars' => $listCars,
            'hasMore' => $hasMore,
        ]);
    }
}
