<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => \App\Models\Link::all()
        ]);
    }

    public function store(Request $request)
    {
        $link = new \App\Models\Link;
        $link->slug = $request->slug;
        $link->url = $request->url;
        $link->save();

        return response()->json([
            'status' => 'success',
            'data' => $link
        ]);
    }

    public function show($id)
    {
        $link = \App\Models\Link::find($id);

        if (!$link) {
            return response()->json([
                'status' => 'error',
                'message' => 'link not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $link
        ]);
    }

    public function update(Request $request, $id)
    {
        $link = \App\Models\Link::find($id);

        if (!$link) {
            return response()->json([
                'status' => 'error',
                'message' => 'link not found'
            ], 404);
        }

        $link->slug = $request->slug;
        $link->url = $request->url;
        $link->save();

        return response()->json([
            'status' => 'success',
            'data' => $link
        ]);
    }

    public function destroy($id)
    {
        $link = \App\Models\Link::find($id);

        if (!$link) {
            return response()->json([
                'status' => 'error',
                'message' => 'link not found'
            ], 404);
        }

        $link->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'link deleted'
        ]);
    }
}
