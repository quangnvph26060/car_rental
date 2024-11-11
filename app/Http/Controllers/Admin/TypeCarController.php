<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TypeCarController extends Controller
{
    public function index()
    {
        $types = Type::select('name', 'short_description', 'title', 'id')->get();
        return view('admin.type-car.index', compact('types'));
    }
    public function create()
    {
        return view('admin.type-car.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6|unique:types,name',
            'title' => 'nullable|min:6|unique:types,title',
            'short_description' => 'required|min:6|max:255',
            'described_above' => 'nullable|min:50',
            'described_below' => 'nullable|min:100',
            'images' => 'required|array|max:2',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], __('request.messages'), [
            'name' => 'Tên loại xe',
            'title' => 'Tiêu đề giới thiệu',
            'short_description' => 'Mô tả ngắn',
            'described_above' => 'Mô tả trên',
            'described_below' => 'Mô tả dưới',
            'images' => 'Hình ảnh'
        ]);
        $images = saveImages($request, 'images', 'type', 640, 370, true);
        try {
            $data = $request->all();
            $data['slug'] =  Str::of($data['name'])->slug('-');
            $data['images'] = $images;
            Type::create($data);
            toastr()->success('Thêm loại xe thành công');
            return redirect()->route('admin.type-car.index');
        } catch (\Exception $e) {
            foreach ((array)$images as $image) {
                deleteImage($image);
            }
            Log::info($e->getMessage());
        }
    }
    public function edit($id)
    {
        $type = Type::findOrfail($id);
        return view('admin.type-car.edit', compact('type'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|min:6|unique:types,name,' . $id,
            'title' => 'nullable|min:6',
            'short_description' => 'required|min:6',
            'described_above' => 'nullable|min:50',
            'described_below' => 'nullable|min:100',
            'images' => 'required|array|max:2',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], __('request.messages'), [
            'name' => 'Tên loại xe',
            'title' => 'Tiêu đề giới thiệu',
            'short_description' => 'Mô tả ngắn',
            'described_above' => 'Mô tả trên',
            'described_below' => 'Mô tả dưới',
            'images' => 'Hình ảnh'
        ]);
        $images = saveImages($request, 'images', 'type', 640, 370, true);
        try {
            $data = $request->except('_token', '_method');
            $data['slug'] =  Str::of($data['name'])->slug('-');
            $type = Type::find($id);
            $type->name = $data['name'];
            $type->title = $data['title'];
            $type->slug = $data['slug'];
            $type->short_description = $data['short_description'];
            $type->described_above = $data['described_above'];
            $type->described_below = $data['described_below'];
            foreach ((array)$type->images as $image) {
                deleteImage($image);
            }
            $type->images = $images;
            $type->save();

            toastr()->success('Cập nhật loại xe thành công');
            return redirect()->route('admin.type-car.index');
        } catch (\Exception $e) {
            foreach ((array)$images as $image) {
                deleteImage($image);
            }
            Log::info($e->getMessage());
        }
    }
    public function destroy($id)
    {
        $type = Type::find($id);
        foreach ((array)$type->images as $image) {
            deleteImage($image);
        }
        if (!$type) {
            return response(['status' => 'error', 'message' => 'Không tìm thấy dữ liệu này']);
        }
        if ($type->brands->count() > 0) {
            return response(['status' => 'error', 'message' => 'Không thể xóa thể loại này vì nó liên quan đến các hãng xe khác , bạn cần xóa các hãng xe liên quan đến loại này']);
        }
        if ($type->cars->count() > 0) {
            return response(['status' =>  'error', 'message' => 'Không thể xóa thể loại này vì nó liên quan đến các xe khác , bạn cần xóa các xe liên quan đến loại này']);
        }
        $type->delete();
        return response(['status' => 'success', 'message' => 'Xóa thành công']);
    }
}
