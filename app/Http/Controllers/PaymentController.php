<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Booking;
use Illuminate\View\View;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.payment.index');
    }

    public function paymentData(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'property_id',
            2 => 'user_name',
            3 => 'agent_name',
            4 => 'payment_option',
            5 => 'payment_status',
            6 => 'deposit',
            7 => 'amount',
            // 8 => 'action',
        ];

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        // Fetching payment data with eager loading for relationships
        $allData = Booking::with(['property', 'user', 'agentUser'])
            ->orderBy($order, $dir);

        $totalData = $allData->count();
        $totalFiltered = $totalData;

        // Search functionality
        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $allData->where(function ($query) use ($search) {
                $query->where('property_id', 'LIKE', "%{$search}%")
                    ->orWhere('user_name', 'LIKE', "%{$search}%")
                    ->orWhere('agent_name', 'LIKE', "%{$search}%")
                    ->orWhere('payment_option', 'LIKE', "%{$search}%")
                    ->orWhere('payment_status', 'LIKE', "%{$search}%")
                    ->orWhere('deposit', 'LIKE', "%{$search}%")
                    ->orWhere('amount', 'LIKE', "%{$search}%");
            });
            $totalFiltered = $allData->count();
        }

        // Pagination
        $allData = $allData->offset($start)
            ->limit($limit)
            ->get();

        $dataArray = [];
        foreach ($allData as $data) {
            $nestedData['id'] = $data->id;
            // Correct property_type and agent_name fetching
            $nestedData['property_id'] = $data->property->property_type ?? '';  // property_type instead of property_id
            $nestedData['user_name'] = $data->user->name ?? '';
            $nestedData['agent_name'] = $data->agentUser->name ?? '';  // Use name instead of agent_name
            $nestedData['payment_option'] = $data->payment_option == 1 ? 'Full Payment' : ($data->payment_option == 2 ? 'Token Amount' : '');
            $nestedData['payment_status'] = $data->payment_status ?? '';
            $nestedData['deposit'] = $data->deposit ?? '';
            $nestedData['amount'] = $data->amount ?? '';
            // $nestedData['action'] = route('admin.payment.edit', $data->id); // Example action URL

            $dataArray[] = $nestedData;
        }

        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $dataArray,
        ];

        return response()->json($json_data);
    }


}
