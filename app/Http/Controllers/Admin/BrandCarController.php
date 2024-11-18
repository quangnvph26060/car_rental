<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Type;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BrandCarController extends Controller
{
    public function index()
    {
        $brands = Brand::select('id', 'type_id', 'title', 'name')->with('type')->get();
        return view('admin.brand-car.index', compact('brands'));
    }
    public function create()
    {
        $types = Type::select('id', 'name')->get();
        return view('admin.brand-car.create', compact('types'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:6|unique:sgo_brands,name',
            'title' => 'nullable|min:6|unique:sgo_brands,title',
            'short_description' => 'nullable|min:20',
            'long_description' => 'nullable|min:30',
            'type_id' => 'nullable',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], __('request.messages'), [
            'name' => 'Tên hãng xe',
            'title' => 'Tiêu đề giới thiệu',
            'type_id' => 'Hãng xe',
            'short_description' => 'Mô tả ngắn',
            'long_description' => 'Mô tả dài',
            'images' => 'Hình ảnh'
        ]);

        $images = saveImages($request, 'images', 'brand', 640, 370, true);

        try {
            $data = $request->all();
            $data['slug'] = Str::of($data['name'])->slug('-');
            $data['images'] = $images;
            Brand::create($data);
            toastr()->success('Thêm hãng xe thành công');
            return redirect()->route('admin.brand-car.index');
        } catch (Exception $e) {
            foreach ((array)$images as $image) {
                deleteImage($image);
            }
            Log::info('Failed to create new Brand: ' . $e->getMessage());
            throw new Exception('Failed to create new Brand');
        }
    }
    public function edit($id)
    {
        $types = Type::select('id', 'name')->get();
        $brand = Brand::findOrFail($id);
        return view('admin.brand-car.edit', compact('types', 'brand'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|min:6|unique:sgo_brands,name,' . $id,
            'title' => 'nullable|min:6',
            'short_description' => 'nullable|min:20',
            'long_description' => 'nullable|min:30',
            'type_id' => 'nullable',
        ], __('request.messages'), [
            'name' => 'Tên hãng xe',
            'title' => 'Tiêu đề giới thiệu',
            'type_id' => 'Hãng xe',
            'short_description' => 'Mô tả ngắn',
            'long_description' => 'Mô tả dài'
        ]);
        $data = $request->except('_token', '_method');
        $data['slug'] =  Str::of($data['name'])->slug('-');
        Brand::where('id', $id)->update($data);
        toastr()->success('Cập nhật hãng xe thành công');
        return redirect()->route('admin.brand-car.index');
    }
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return response(['status' => 'error', 'message' => 'Không tìm thấy dữ liệu này']);
        }
        if ($brand->cars->count() > 0) {
            return response(['status' =>  'error', 'message' => 'Không thể xóa thể loại này vì nó liên quan đến các xe khác , bạn cần xóa các xe liên quan đến loại này']);
        }
        $brand->delete();
        return response(['status' => 'success', 'message' => 'Xóa thành công hãng xe']);
    }
}
