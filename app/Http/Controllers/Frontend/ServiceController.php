<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service(string $slug = null)
    {
        $types = Type::withCount('brands')
            ->orderBy('brands_count', 'desc')
            ->get();
        if ($slug == null) {
            $title = 'Dịch vụ';
        } else {
            $type = Type::where('slug', $slug)->first();

            if ($type == null) {
                $title = 'không có';
            } else {

                $title = $type->title;
            }

            return view('frontend.pages.service', compact('title', 'slug', 'type', 'types'));
        }

        return view('frontend.pages.service', compact('title', 'slug', 'types'));
    }
    public function brand(string $slug = null){
        
    }
}
