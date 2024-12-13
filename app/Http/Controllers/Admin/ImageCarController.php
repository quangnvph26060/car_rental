<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ImageCarController extends Controller
{
    public function index($slug = null)
    {
        $car = Car::where('slug', $slug)->first();
        $images = CarImage::where('car_id', $car->id)->get();
        return view('admin.image-car.index', compact('car', 'images'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'image_path' => 'required|array',
            'image_path.*' => 'image|mimes:jpeg,jpg,png,gif,webp|max:2048',
        ], __('request.messages'), [
            'image_path' => 'Hình ảnh'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'validation_errors' => $validator->errors()
            ], 422);
        }

        // $images = collect($request->image_path)->map(function ($item) use ($request) {
        //     return saveImagesWithoutResize($request, 'image_path', 'cars', true);
        // })->toArray();

        $images = saveImagesWithoutResize($request, 'image_path', 'cars', true);

        try {
            foreach ($images as $image) {
                CarImage::create([
                    'car_id' => $request->carId,
                    'image_path' => $image
                ]);
            }
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            foreach ($images as $image) {
                deleteImage($image);
            }
            Log::info($e->getMessage());
        }
    }
    public function destroy($id)
    {
        $image = CarImage::find($id);
        deleteImage($image->image_path);
        $image->delete();
        return response(['status' => 'success', 'message' => 'Xóa thành công']);
    }
}
