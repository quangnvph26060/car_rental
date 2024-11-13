<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCommitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ServiceCommitmentController extends Controller
{
    public function index()
    {
        $serviceCommitments = ServiceCommitment::select('id', 'title', 'description', 'icon')->get();
        return view('admin.service-commitment.index', compact('serviceCommitments'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:6|unique:sgo_benefits,title',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|min:10|max:225'
        ], __('request.messages'), [
            'title' => 'Tiêu đề',
            'icon' => 'Biểu tượng',
            'description' => 'Mô tả ngắn'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'validation_errors' => $validator->errors()
            ], 422);
        }
        $data = $request->all();
        $icon = saveImages($request, 'icon', 'serviceCommitment', 70, 70);
        try {
            $data['icon'] = $icon;
            ServiceCommitment::create($data);
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            deleteImage($icon);
            Log::info($e->getMessage());
        }
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $serviceCommitment  = ServiceCommitment::find($id);
        return response()->json($serviceCommitment);
    }
    public function update(Request $request)
    {
        try {
            $data = $request->all();
            if (!empty($data['icon'])) {
                deleteImage($request->service_commitment_icon);
                $icon = saveImages($request, 'icon', 'serviceCommitment', 70, 70);
                $data['icon'] = $icon;
            }
            $serviceCommitment = ServiceCommitment::find($request->service_commitment_id);
            $serviceCommitment->update($data);
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            deleteImage($icon);
            Log::info($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $serviceCommitment = ServiceCommitment::find($id);
        deleteImage($serviceCommitment->icon);
        $serviceCommitment->delete();
        return response(['status' => 'success', 'message' => 'Xóa thành công']);
    }
}
