<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Post;
use App\Models\Review;
use App\Models\SgoContact;
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
            $cars = Car::where('name', 'like', '%' . $search . '%')->paginate(9);
            return view('frontend.pages.product.search', compact('cars','search'));
        }

        $posts = Post::take(4)->get();
        $contact = SgoContact::first();
        return view('frontend.pages.home', compact('types', 'cars', 'reviews', 'posts', 'contact'));
    }
}
