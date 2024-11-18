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

        $query = Type::query()->select('id', 'name');

        if (request()->ajax()) {
            $cars = $query->where('id', request()->type_id)->with('cars:name,id')->first();

            return response()->json([
                'cars' => $cars->cars ?? [],
            ]);
        }

        $typecars = $query->get();

        return view('frontend.pages.booking', compact('typecars'));
    }

    public function store(Request $request)
    {
        $credentials = Validator::make(
            $request->all(),
            [
                'car_id' => 'required|exists:sgo_cars,id',
                'type_id' => 'required|exists:sgo_types,id',
                'start_date' => 'required',
                'rental_days' => 'required',
                'name' => 'required',
                'phone' => 'required',
            ],
            __('request.messages')
        );

        if ($credentials->fails()) {
            return response()->json([
                'status' => 'error',
                'validation_errors' => $credentials->errors()
            ], 422);
        }

        Booking::create($credentials->validated());

        return response()->json([
            'status' => true,
            'message' => 'Vui lòng chú ý điện thoại, Chúng tôi sẽ liên hệ với qúy khách trong thời gian sắp tới.'
        ]);
    }
}
