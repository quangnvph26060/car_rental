<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Review;
use App\Models\ServiceCommitment;
use App\Models\Type;
use Illuminate\Http\Request;

class IntroduceController extends Controller
{
    public function introduce(){

        $reviews = Review::get();
        $servicecommitments = ServiceCommitment::get();
        $use_service = Type::take(10)
        ->with(['cars' => function($query) {
            $query->select('type_id', 'price');  // Chọn các trường cần thiết
        }])
        ->get();

        $cars = Car::all();


        // dd($use_service[5]->cars);


        //  dd($reviews);
        return view('frontend.pages.introduce', compact('reviews', 'servicecommitments', 'use_service', 'cars'));
    }
}
