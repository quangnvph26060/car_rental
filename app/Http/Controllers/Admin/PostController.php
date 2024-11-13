<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = CategoryPost::all();
        return view('admin.post.index', compact('posts', 'categories'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:6|unique:sgo_posts,title',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|min:10',
            'category_post_id' => 'required'
        ], __('request.messages'), [
            'title' => 'Tiêu đề bài viết',
            'image' => 'Hình ảnh bài viết',
            'description' => 'Mô tả',
            'category_post_id' => 'Danh mục bài viết'
        ]);
        $data = $request->all();
        $image = saveImages($request, 'image', 'post', 800, 507);
        try {
            $data['image'] = $image;
            Post::create($data);
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
            deleteImage($image);
            Log::info($e->getMessage());
        }
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $post  = Post::find($id);
        return response()->json($post);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:6|unique:sgo_posts,title,' . $request->post_id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|min:10',
            'category_post_id' => 'required'
        ], __('request.messages'), [
            'title' => 'Tiêu đề bài viết',
            'image' => 'Hình ảnh bài viết',
            'description' => 'Mô tả',
            'category_post_id' => 'Danh mục bài viết'
        ]);
        try {
            $data = $request->all();
            if (!empty($data['image'])) {
                deleteImage($request->post_image);
                $image = saveImages($request, 'image', 'post', 800, 507);
                $data['image'] = $image;
            }
            $post = Post::find($request->post_id);
            $post->update($data);
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
            deleteImage($image);
            Log::info($e->getMessage());
        }
    }
    public function changeStatus(Request $request)
    {
        $post = Post::find($request->postId);
        if (!$post) {
            return response()->json(['error' => 'Không tìm thấy bài viết này!']);
        }
        $post->status = $request->status;
        $post->save();
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        deleteImage($post->image);
        $post->delete();
        return response(['status' => 'success', 'message' => 'Xóa thành công']);
    }
}
