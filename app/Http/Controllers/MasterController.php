<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index(Request $request)
    {
        return view('layout.partials.master');
    }
}
