<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryPostController extends Controller
{
    public function index()
    {
        $categories = CategoryPost::select('id', 'name')->get();
        return view('admin.categories-post.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6|unique:sgo_category_posts,name',
        ], __('request.messages'), [
            'name' => 'Tên danh mục',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'validation_errors' => $validator->errors()
            ], 422);
        }

        CategoryPost::create(['name' => $request->name]);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $categoryPost  = CategoryPost::find($id);
        return response()->json($categoryPost);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6|unique:sgo_category_posts,name,' . $request->categories_post_id,
        ], __('request.messages'), [
            'name' => 'Tên danh mục',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'validation_errors' => $validator->errors()
            ], 422);
        }
        CategoryPost::where('id', $request->categories_post_id)->update(['name' => $request->name]);
        return response()->json([
            'status' => 200,
        ]);
    }
    public function destroy($id)
    {
        $categoryPost = CategoryPost::find($id);
        $categoryPost->delete();
        return response(['status' => 'success', 'message' => 'Xóa thành công']);
    }
}
