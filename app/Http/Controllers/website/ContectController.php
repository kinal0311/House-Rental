<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContectController extends Controller
{

    public function index(Request $request)
    {
        return view('frontend.contect');
    }
}
