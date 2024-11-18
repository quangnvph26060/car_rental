<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Car;
use App\Models\Review;
use App\Models\ServiceCommitment;
use App\Models\SgoContact;
use App\Models\Type;
use Illuminate\Http\Request;

class IntroduceController extends Controller
{
    public function introduce()
    {

        $reviews = Review::get();
        $use_service = Type::take(10)
            ->with(['cars' => function ($query) {
                $query->select('type_id', 'price');  // Chọn các trường cần thiết
            }])
            ->get();

        $cars = Car::all();
        $benefits = Benefit::where('status', 1)->latest()->take(4)->get();
        $commitments = ServiceCommitment::latest()->take(3)->get();
        return view('frontend.pages.introduce', compact('reviews', 'commitments', 'use_service', 'cars', 'benefits'));
    }
}
