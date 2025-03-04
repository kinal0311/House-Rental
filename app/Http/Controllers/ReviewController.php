<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Feedback;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ReviewController extends Controller
{

    public function index(Request $request)
    {
        return view('admin.review.index');
    }

    public function reviewData(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'user_name',
            2 => 'property_name',
            3 => 'comment',
            4 => 'rating',
            5 => 'created_at',
        ];

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        // Fetching feedback data with relationships
        $allData = Feedback::with(['user', 'property'])
            ->orderBy($order, $dir);

        $totalData = $allData->count();
        $totalFiltered = $totalData;

        // Search functionality
        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $allData->where(function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhereHas('property', function ($q) use ($search) {
                    $q->where('property_type', 'LIKE', "%{$search}%");
                })
                ->orWhere('comment', 'LIKE', "%{$search}%")
                ->orWhere('rating', 'LIKE', "%{$search}%");
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
            $nestedData['user_name'] = $data->user->name ?? '';
            $nestedData['property_name'] = $data->property->property_type ?? '';
            $nestedData['comment'] = $data->comment;
            $nestedData['rating'] = $data->rating;
            // $nestedData['created_at'] = $data->created_at->format('Y-m-d H:i:s');

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

    public function destroy($id)
    {
        try {
            $review = Feedback::findOrFail($id); // Find the review by ID
            $review->delete(); // Soft delete

            return response()->json([
                'success' => true,
                'message' => 'Review deleted successfully.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting the review.',
            ], 500);
        }
    }


}
