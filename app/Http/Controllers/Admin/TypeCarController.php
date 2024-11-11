<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
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
            'short_description' => 'required|min:6',
            'described_above' => 'nullable|min:50',
            'described_below' => 'nullable|min:100'
        ], __('request.messages'), [
            'name' => 'Tên loại xe',
            'title' => 'Tiêu đề giới thiệu',
            'short_description' => 'Mô tả ngắn',
            'described_above' => 'Mô tả trên',
            'described_below' => 'Mô tả dưới'
        ]);
        $data = $request->all();
        $data['slug'] =  Str::of($data['name'])->slug('-');
        Type::create($data);
        toastr()->success('Thêm loại xe thành công');
        return redirect()->route('admin.type-car.index');
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
            'described_below' => 'nullable|min:100'
        ], __('request.messages'), [
            'name' => 'Tên loại xe',
            'title' => 'Tiêu đề giới thiệu',
            'short_description' => 'Mô tả ngắn',
            'described_above' => 'Mô tả trên',
            'described_below' => 'Mô tả dưới'
        ]);
        $data = $request->except('_token', '_method');
        $data['slug'] =  Str::of($data['name'])->slug('-');
        Type::where('id', $id)->update($data);
        toastr()->success('Cập nhật loại xe thành công');
        return redirect()->route('admin.type-car.index');
    }
    public function destroy($id)
    {
        $type = Type::find($id);
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
