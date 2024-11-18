<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function color($slug){
        $color = Color::where('slug',$slug)->first();
        $carbycolor = Car::where('color_id', $color->id)->get();
    }
}
