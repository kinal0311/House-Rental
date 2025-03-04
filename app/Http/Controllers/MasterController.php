<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Feedback;
use App\Models\Booking;
use App\Models\Visit;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Carbon\Carbon;



class MasterController extends Controller
{
    public function index(Request $request)
    {
        return view('layout.partials.master');
    }

    public function show(Request $request)
    {
        $totalCustomers = User::where('role_id', 3)->count();
        $totalAgents = User::where('role_id', 2)->count();
        $todaySales = Booking::whereDate('created_at', Carbon::today())->count();
        $feedbacks = Feedback::latest()->take(6)->get();
        $payments = Booking::latest()->take(6)->get();
        $todayVisits = Visit::whereDate('created_at', Carbon::today())->count();
        return view('admin.dashboard', compact('totalCustomers','todaySales','totalAgents','feedbacks', 'payments','todayVisits'));
    }
}
