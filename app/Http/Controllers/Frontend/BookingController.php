<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Type;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\BookingNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
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
                    'regex:/^0[0-9]{9}$/'
                ],
                'note' => 'nullable'
            ],
            __('request.messages'),
            [
                'car_id' => 'Xe',
                'type_id' => 'Loại xe',
                'start_date' => 'Ngày thuê',
                'rental_days' => 'Số ngày thuê',
                'name' => 'Tên khách hàng',
                'phone' => 'Số diện thoại',
                'note' => 'Ghi chú'
            ]
        );

        if ($credentials->fails()) {
            return response()->json([
                'status' => false,
                'message' => $credentials->errors()->first()
            ], 422);
        }

        $result = Booking::create($credentials->validated());

        $data = Booking::with('car', 'type')->find($result->id);

        Mail::send(new BookingNotification($data->car->name, $data->type->name, $data->start_date, $data->rental_days, $data->name, $data->phone, $data->note));

        return response()->json([
            'status' => true,
            'message' => 'Chúng tôi sẽ liên hệ với qúy khách trong thời gian sắp tới.'
        ]);
    }
}
