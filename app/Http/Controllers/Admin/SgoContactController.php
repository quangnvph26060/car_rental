<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\SgoContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SgoContactController extends Controller
{
    public function getContactInfo()
    {
        $contact = SgoContact::first();
        return view('admin.contact.index', compact('contact'));
    }

    // Hàm cập nhật thông tin liên hệ
    public function updateContactInfo(Request $request)
    {

        // dd($request->all());
        $contactInfo = SgoContact::first();
        if (!$contactInfo) {
            $contactInfo = new SgoContact();
        }

        $contactInfo->fill($request->all());
        $contactInfo->save();

        return redirect()->back()->with('success', 'Cập nhật thông tin liên hệ thành công');
    }

    public function bookingRequest()
    {
        $bookingRequests = Booking::with(['car', 'type'])->latest()->get();
        return view('admin/booking/booking-request', compact('bookingRequests'));
    }

    public function bookingEmail(Request $request)
    {
        $credentials = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
            ],
            __('request.messages'),
            [
                'email' => 'Email',
            ]
        );

        $envFile = base_path('.env');
        $envContent = file_get_contents($envFile);

        $envContent = preg_replace("/^MAIL_TO=.*/m", "MAIL_TO={$credentials->validated()['email']}", $envContent);

        File::put($envFile, $envContent);

        return response()->json(['status' => true, 'message' => 'Cập nhật thành công']);
    }
}
