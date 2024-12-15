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
            'name' => 'required|min:3|unique:sgo_types,name',
            'title' => 'nullable|min:3|unique:sgo_types,title',
            'short_description' => 'required|min:6|max:255',
            'described_above' => 'nullable|min:50',
            'described_below' => 'nullable|min:100',
            'image_front' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_back' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], __('request.messages'), [
            'name' => 'Tên loại xe',
            'title' => 'Tiêu đề giới thiệu',
            'short_description' => 'Mô tả ngắn',
            'described_above' => 'Mô tả trên',
            'described_below' => 'Mô tả dưới',
            'image_front' => 'Hình ảnh trước',
            'image_back' => 'Hình ảnh sau',
        ]);
        $imageFront = saveImages($request, 'image_front', 'type', 640, 370);
        $imageBack = saveImages($request, 'image_back', 'type', 640, 370);
        try {
            $data = $request->all();
            $data['slug'] =  Str::of($data['name'])->slug('-');
            $data['image_front'] = $imageFront;
            $data['image_back'] = $imageBack;
            Type::create($data);
            toastr()->success('Thêm loại xe thành công');
            return redirect()->route('admin.type-car.index');
        } catch (\Exception $e) {
            deleteImage($imageFront);
            deleteImage($imageBack);
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
        $data = $request->validate([
            'name' => 'required|min:3|unique:sgo_types,name,' . $id,
            'title' => 'nullable|min:3',
            'short_description' => 'required|min:6',
            'described_above' => 'nullable|min:50',
            'described_below' => 'nullable|min:100',
            'image_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_back' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], __('request.messages'), [
            'name' => 'Tên loại xe',
            'title' => 'Tiêu đề giới thiệu',
            'short_description' => 'Mô tả ngắn',
            'described_above' => 'Mô tả trên',
            'described_below' => 'Mô tả dưới',
            'image_front' => 'Hình ảnh trước',
            'image_back' => 'Hình ảnh sau',
        ]);
        $type = Type::find($id);
        if (!empty($data['image_front'])) {
            deleteImage($type->image_front);
            $imageFront = saveImages($request, 'image_front', 'type', 640, 370);
            $data['image_front'] = $imageFront;
        }
        if (!empty($data['image_back'])) {
            deleteImage($type->image_back);
            $imageBack = saveImages($request, 'image_back', 'type', 640, 370);
            $data['image_back'] = $imageBack;
        }
        try {
            $data['slug'] =   Str::slug($data['name'], '-');
            $type->update($data);
            toastr()->success('Cập nhật loại xe thành công');
            return redirect()->route('admin.type-car.index');
        } catch (\Exception $e) {
            deleteImage($imageFront);
            deleteImage($imageBack);
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
