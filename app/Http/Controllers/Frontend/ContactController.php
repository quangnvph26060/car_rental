<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SgoContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $contact = SgoContact::first();
        return view('frontend.pages.contact', compact('contact'));
    }
}
