<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubmitPropertyController extends Controller
{

    public function index(Request $request)
    {
        return view('frontend.submit-property');
    }
}

