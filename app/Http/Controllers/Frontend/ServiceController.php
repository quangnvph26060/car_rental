<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service(string $slug = null)
    {
        return view('frontend.pages.service', compact('slug'));
    }
}
