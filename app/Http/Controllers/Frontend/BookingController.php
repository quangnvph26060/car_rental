<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function booking()
    {

        $query = Car::query();

        if (request()->ajax()) {
            $typeCars = $query->where('id', request()->car_id)->with('types:name,id')->first();

            return response()->json([
                'types' => $typeCars->types ?? [],
            ]);
        }

        $cars = $query->pluck('name', 'id')->toArray();

        return view('frontend.pages.booking', compact('cars'));
    }

    public function store(Request $request)
    {
        $credentials = Validator::make(
            $request->all(),
            [
                'car_id' => 'required|exists:sgo_cars,id',
                'type_id' => 'required|exists:sgo_types,id',
                'start_date' => 'required|date|after_or_equal:now',
                'rental_days' => 'required|numeric|min:1',
                'name' => 'required',
                'phone' => [
                    'required',
                    'regex:/^0[0-9]{9}$/'],
            ],
            __('request.messages'),
            [
                'car_id' => 'Xe',
                'type_id' => 'Loại xe',
                'start_date' => 'Ngày thuê',
                'rental_days' => 'Số ngày thuê',
                'name' => 'Tên khách hàng',
                'phone' => 'Số diện thoại'
            ]
        );

        if ($credentials->fails()) {
            return response()->json([
                'status' => false,
                'message' => $credentials->errors()->first()
            ], 422);
        }

        Booking::create($credentials->validated());

        return response()->json([
            'status' => true,
            'message' => 'Chúng tôi sẽ liên hệ với qúy khách trong thời gian sắp tới.'
        ]);
    }
}
