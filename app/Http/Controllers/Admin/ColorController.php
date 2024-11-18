<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1|unique:sgo_colors,name',
            'code_color' => 'required|min:1|unique:sgo_colors,code_color',
        ], __('request.messages'), [
            'name' => 'Tên màu',
            'code_color' => 'Mã màu'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'validation_errors' => $validator->errors()
            ], 422);
        }

        Color::create(['name' => $request->name, 'code_color' => $request->code_color]);
        return response()->json([
            'status' => 200,
        ]);
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $color  = Color::find($id);
        return response()->json($color);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1|unique:sgo_colors,name,' . $request->color_id,
            'code_color' => 'required|min:1|unique:sgo_colors,code_color,' . $request->color_id
        ], __('request.messages'), [
            'name' => 'Tên màu',
            'code_color' => 'Mã màu'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'validation_errors' => $validator->errors()
            ], 422);
        }
        Color::where('id', $request->color_id)->update(['name' => $request->name, 'code_color' => $request->code_color]);
        return response()->json([
            'status' => 200,
        ]);
    }
    public function destroy($id)
    {
        $color = Color::find($id);
        $color->delete();
        return response(['status' => 'success', 'message' => 'Xóa thành công']);
    }
}
