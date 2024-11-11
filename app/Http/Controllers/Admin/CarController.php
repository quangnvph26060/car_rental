<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Type;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return view('admin.cars.index');
    }
    public function create()
    {
        $types = Type::select('id', 'name')->get();
        $brands = Brand::select('id', 'name')->get();
        return view('admin.cars.create',  compact('types', 'brands'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:6|unique:cars,name',
            'introductory_title' => 'required|min:6',
            'price' => 'require|numeric|min:1',
            'promotion_details' => 'required',
            'color_id' => 'nullable',
            'contact_phone' => 'nullable',

        ]);
    }
}
