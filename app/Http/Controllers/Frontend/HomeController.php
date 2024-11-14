<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Review;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $search = request()->input('s');
        $types = Type::all();
        $cars = Car::where('status', 1)->get();
        $reviews = Review::all();
        if ($search) {
            return view('frontend.pages.product.search');
        }

        return view('frontend.pages.home', compact('types', 'cars', 'reviews'));
    }
}
