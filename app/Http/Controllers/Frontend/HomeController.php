<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Car;
use App\Models\Post;
use App\Models\Review;
use App\Models\ServiceCommitment;
use App\Models\SgoContact;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $search = request()->input('s');
        $types = Type::latest()->take(6)->get();
        $cars = Car::take(6)->get();
        $carsGallery = Car::take(8)->get();
        $reviews = Review::all();
        if ($search) {
            $cars = Car::where('name', 'like', '%' . $search . '%')->paginate(9);
            return view('frontend.pages.product.search', compact('cars', 'search'));
        }

        $posts = Post::take(4)->get();
        $contact = SgoContact::first();
        $benefits = Benefit::where('status', 1)->latest()->take(4)->get();
        $commitments = ServiceCommitment::latest()->take(3)->get();
        return view('frontend.pages.home', compact('types', 'cars', 'reviews', 'posts', 'contact', 'benefits', 'commitments', 'carsGallery'));
    }
}
