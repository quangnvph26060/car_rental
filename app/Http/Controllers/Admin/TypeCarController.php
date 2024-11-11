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
        $types = Type::select('name', 'short_description', 'described_above', 'described_below', 'title')->get();
        return view('admin.type-car.index' , compact('types'));
    }
    public function create()
    {
        return view('admin.type-car.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'title' => 'nullable|min:6',
            'short_description' => 'required|min:6',
            'described_above' => 'nullable|min:50',
            'described_below' => 'nullable|min:100'
        ]);
        $data = $request->all();
        $data['slug'] =  Str::of($data['name'])->slug('-');
        Type::create($data);
        toastr()->success('Thêm loại xe thành công');
        return redirect()->route('admin.type-car.index');
    }
}
