<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BenefitController extends Controller
{
    public function index()
    {
        $benefits = Benefit::select('id', 'title', 'description', 'icon', 'image')->get();
        return view('admin.benefit.index', compact('benefits'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:6|unique:sgo_benefits,title',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|min:10|max:225'
        ], __('request.messages'), [
            'title' => 'Tiêu đề',
            'icon' => 'Biểu tượng',
            'image' => 'Hình ảnh',
            'description' => 'Mô tả ngắn'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'validation_errors' => $validator->errors()
            ], 422);
        }
        $data = $request->all();
        $icon = saveImages($request, 'icon', 'benefit', 70, 70);
        $image = saveImages($request, 'image', 'benefit', 293, 293);
        try {
            $data['icon'] = $icon;
            $data['image'] = $image;
            Benefit::create($data);
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            deleteImage($image);
            deleteImage($icon);
            Log::info($e->getMessage());
        }
    }
    public function changeStatus(Request $request)
    {
        $benefits = Benefit::find($request->benefitId);
        if (!$benefits) {
            return response()->json(['error' => 'Không tìm thấy lợi ích này!']);
        }
        $benefits->status = $request->status;
        $benefits->save();
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $benefit  = Benefit::find($id);
        return response()->json($benefit);
    }
    public function update(Request $request)
    {
        try {
            $data = $request->all();
            if (!empty($data['icon'])) {
                deleteImage($request->benefit_icon);
                $icon = saveImages($request, 'icon', 'benefit', 70, 70);
                $data['icon'] = $icon;
            }
            if (!empty($data['image'])) {
                deleteImage($request->benefit_image);
                $image = saveImages($request, 'image', 'benefit', 293, 293);
                $data['image'] = $image;
            }
            $benefit = Benefit::find($request->benefit_id);
            $benefit->update($data);
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            deleteImage($image);
            deleteImage($icon);
            Log::info($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $benefit = Benefit::find($id);
        deleteImage($benefit->image);
        deleteImage($benefit->icon);
        $benefit->delete();
        return response(['status' => 'success', 'message' => 'Xóa thành công']);
    }
}
