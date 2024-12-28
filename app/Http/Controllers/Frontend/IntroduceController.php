<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Benefit;
use App\Models\Car;
use App\Models\Review;
use App\Models\ServiceCommitment;
use App\Models\Type;

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
        $carsGallery = Car::take(8)->get();
        $images = $this->getFirstImages();
        return view('frontend.pages.introduce', compact('reviews', 'commitments', 'use_service', 'cars', 'benefits', 'carsGallery', 'images'));
    }

    public function getFirstImages()
    {
        // Lấy tất cả các album
        $albums = Album::all();

        $images = [];

        // Duyệt qua từng album để lấy ảnh đầu tiên
        foreach ($albums as $album) {
            // Giả sử albums là một mảng JSON chứa các URL ảnh
            $albumImages = $album->album;

            // Kiểm tra xem có ảnh không và lấy ảnh đầu tiên
            if (is_array($albumImages) && count($albumImages) > 0) {
                $images[] = $albumImages[0]; // Lấy ảnh đầu tiên
            }
        }

        return $images;
    }
}
