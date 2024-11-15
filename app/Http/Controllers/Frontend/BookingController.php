<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Type;
use Illuminate\Http\Request;


class BookingController extends Controller
{
    public function booking(){

        $cars = Car::all();
        $typecars = Type::get();

        return view('frontend.pages.booking', compact('cars', 'typecars'));
    }
}
