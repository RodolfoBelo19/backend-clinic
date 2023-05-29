<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessLogTrackersController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => \App\Models\AccessLogTracker::all()
        ]);
    }

    public function store(Request $request)
    {
        $accessLogTracker = new \App\Models\AccessLogTracker;
        $accessLogTracker->link_id = $request->link_id;
        $accessLogTracker->ip_address = $request->ip_address;
        $accessLogTracker->user_agent = $request->user_agent;
        $accessLogTracker->count_access = 1;
        $accessLogTracker->save();

        return response()->json([
            'status' => 'success',
            'data' => $accessLogTracker
        ]);
    }

    public function show($id)
    {
        $accessLogTracker = \App\Models\AccessLogTracker::find($id);

        if (!$accessLogTracker) {
            return response()->json([
                'status' => 'error',
                'message' => 'access log tracker not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $accessLogTracker
        ]);
    }
}
