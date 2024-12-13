<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Color;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CarController extends Controller
{
    public function index()
    {
        $cars  = Car::select('id', 'name', 'price', 'status', 'slug', 'image', 'is_favorite')->with('types', 'brands', 'carImages', 'color')->get();
        return view('admin.cars.index', compact('cars'));
    }
    public function create()
    {
        $types = Type::select('id', 'name')->get();
        $brands = Brand::select('id', 'name')->get();
        $colors = Color::select('id', 'name', 'code_color')->get();
        return view('admin.cars.create',  compact('types', 'brands', 'colors'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:6|unique:sgo_cars,name',
            'introductory_title' => 'nullable|min:6',
            'price' => 'required|numeric|min:1',
            'promotion_details' => 'nullable|min:10',
            'color_id' => 'nullable',
            'description' => 'nullable',
            'short_description' => 'nullable',
            'number_of_seats' => 'nullable|min:1|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_ids' => 'required|array',
            'type_ids.*' => 'exists:sgo_types,id',
            'brand_ids' => 'required|array',
            'brand_ids.*' => 'exists:sgo_brands,id',
            'status' => 'required',
            'is_favorite' => 'required'
        ], __('request.messages'), [
            'name' => 'Tên xe',
            'introductory_title' => 'Tiêu đề giới thiệu xe',
            'price' => 'Giá xe',
            'promotion_details' => 'Chi tiết về phần giảm giá',
            'color_id' => 'Màu xe',
            'description' => 'Mô tả',
            'number_of_seats' => 'Số ghế',
            'image' => 'Hình ảnh',
            'type_ids' => 'Loại xe',
            'brand_ids' => 'Hãng xe',
            'status' => 'Trạng thái'
        ]);

        $image = saveImage($request, 'image', 'cars');

        try {
            $validated['slug'] = Str::slug($validated['name'], '-');
            $validated['image'] = $image;
            $car = Car::create($validated);
            $car->types()->sync($validated['type_ids']);
            $car->brands()->sync($validated['brand_ids']);
            toastr()->success('Thêm xe thành công');
            return redirect()->route('admin.car.index');
        } catch (\Exception $e) {
            deleteImage($image);
            Log::info($e->getMessage());
        }
    }


    public function edit($id)
    {
        $types = Type::select('id', 'name')->get();
        $brands = Brand::select('id', 'name')->get();
        $colors = Color::select('id', 'name', 'code_color')->get();
        $car = Car::find($id);
        return view('admin.cars.edit',  compact('types', 'brands', 'colors', 'car'));
    }
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:6|unique:sgo_cars,name,' . $id,
            'introductory_title' => 'nullable|min:6',
            'price' => 'required|numeric|min:1',
            'promotion_details' => 'nullable|min:10',
            'color_id' => 'nullable',
            'description' => 'nullable',
            'short_description' => 'nullable',
            'number_of_seats' => 'nullable|min:1|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_ids' => 'required|array',
            'type_ids.*' => 'exists:sgo_types,id',
            'brand_ids' => 'required|array',
            'brand_ids.*' => 'exists:sgo_brands,id',
            'status' => 'required',
            'is_favorite' => 'required'
        ], __('request.messages'), [
            'name' => 'Tên xe',
            'introductory_title' => 'Tiêu đề giới thiệu xe',
            'price' => 'Giá xe',
            'promotion_details' => 'Chi tiết về phần giảm giá',
            'color_id' => 'Màu xe',
            'description' => 'Mô tả',
            'number_of_seats' => 'Số ghế',
            'image' => 'Hình ảnh',
            'type_ids' => 'Loại xe',
            'brand_ids' => 'Hãng xe',
            'status' => 'Trạng thái'
        ]);
        try {
            $car = Car::find($id);
            if (!empty($validated['image'])) {
                deleteImage($request->old_image);
                $image = saveImage($request, 'image', 'cars');
                $validated['image'] = $image;
            }
            $validated['slug'] = Str::slug($validated['name'], '-');
            $car->update($validated);
            $car->types()->sync($validated['type_ids']);
            $car->brands()->sync($validated['brand_ids']);
            toastr()->success('Cập nhật xe thành công');
            return redirect()->route('admin.car.index');
        } catch (\Exception $e) {
            deleteImage($image);
            Log::info($e->getMessage());
        }
    }
    public function destroy($id)
    {
        $car = Car::find($id);
        deleteImage($car->image);
        $car->delete();
        return response(['status' => 'success', 'message' => 'Xóa thành công']);
    }

    public function changeStatus(Request $request)
    {
        $car = Car::find($request->carId);
        if (!$car) {
            return response()->json(['error' => 'Không tìm thấy xe này!']);
        }
        $car->status = $request->status;
        $car->save();
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }

    public function activeFavorite(Request $request)
    {
        $car = Car::find($request->carId);
        if (!$car) {
            return response()->json(['error' => 'Không tìm thấy xe này!']);
        }
        $car->is_favorite = $request->is_favorite;
        $car->save();
        return response()->json(['success' => 'Cập nhật thành xe yêu thích thành công!']);
    }
}
