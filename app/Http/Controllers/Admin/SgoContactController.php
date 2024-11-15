<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SgoContact;
use Illuminate\Http\Request;

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

        return redirect()->back()->with('success','Cập nhật thông tin liên hệ thành công');
    }
}
