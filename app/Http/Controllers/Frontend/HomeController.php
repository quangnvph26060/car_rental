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
        $favoriteCar = Car::query()->favorite()->limit(5)->get();
        $carsGallery = Car::take(8)->get();
        $reviews = Review::all();
        if ($search) {
            $cars = Car::where('name', 'like', '%' . $search . '%')->paginate(9);
            return view('frontend.pages.product.search', compact('cars', 'search', 'types', 'favoriteCar'));
        }

        $posts = Post::take(4)->get();
        $contact = SgoContact::first();
        $benefits = Benefit::where('status', 1)->latest()->take(4)->get();
        $commitments = ServiceCommitment::latest()->take(3)->get();
        return view('frontend.pages.home', compact('types', 'cars', 'reviews', 'posts', 'contact', 'benefits', 'commitments', 'carsGallery'));
    }

    public function ajax(Request $request)
    {
        // Số bản ghi mỗi lần tải
        $perPage = 6;

        // Tính offset dựa vào page được gửi lên
        $page = $request->input('page', 2); // Mặc định page = 1 nếu không có giá trị
        $offset = ($page - 1) * $perPage;

        // Lấy thêm các bản ghi
        $cars = Car::skip($offset)->take($perPage)->get();

        // Kiểm tra nếu hết bản ghi
        $hasMore = Car::count() > ($offset + $perPage);

        return response()->json([
            'cars' => $cars,
            'hasMore' => $hasMore, // Để kiểm tra còn xe hay không
        ]);
    }

    public function gallery()
    {
        $cateCars = Type::query()->latest()->with(['cars.carImages'])->take(7)->get();

        // dd($cateCars);

        return view('frontend.pages.album', compact('cateCars'));
    }
}
