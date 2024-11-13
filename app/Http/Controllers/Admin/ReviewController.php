<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('admin.review.index', compact('reviews'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|min:6',
            'customer_role' => 'required|min:6',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'comment' => 'required|min:10',
        ], __('request.messages'), [
            'customer_name' => 'Tên khách hàng',
            'customer_role' => 'Vai trò khách hàng',
            'comment' => 'Đánh giá',
            'avatar' => 'Ảnh khách hàng'
        ]);
        $data = $request->all();
        $avatar = saveImages($request, 'avatar', 'review', 150, 150);
        try {
            $data['avatar'] = $avatar;
            Review::create($data);
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'validation_errors' => $validator->errors()
                ], 422);
            }
            deleteImage($avatar);
            Log::info($e->getMessage());
        }
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $review  = Review::find($id);
        return response()->json($review);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|min:6',
            'customer_role' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'comment' => 'required|min:10',
        ], __('request.messages'), [
            'customer_name' => 'Tên khách hàng',
            'customer_role' => 'Vai trò khách hàng',
            'comment' => 'Đánh giá',
            'avatar' => 'Ảnh khách hàng'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'validation_errors' => $validator->errors()
            ], 422);
        }
        try {
            $data = $request->all();
            if (!empty($data['avatar'])) {
                deleteImage($request->review_avatar);
                $avatar = saveImages($request, 'avatar', 'review', 150, 150);
                $data['avatar'] = $avatar;
            }
            $review = Review::find($request->review_id);
            $review->update($data);
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $e) {

            deleteImage($avatar);
            Log::info($e->getMessage());
        }
    }
    public function destroy($id)
    {
        $review = Review::find($id);
        deleteImage($review->avatar);
        $review->delete();
        return response(['status' => 'success', 'message' => 'Xóa thành công']);
    }
}
