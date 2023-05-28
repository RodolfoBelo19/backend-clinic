<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $url = $request->url;
        $link->slug = $request->slug;

        $response = Http::post('https://api.encurtador.dev/encurtamentos', [
            'url' => $url
        ]);

        $dataJson = $response->json();
        $data = $dataJson['urlEncurtada'];

        if ($data) {
            $link->url = $data;
            $link->save();

            return response()->json([
                'link' => $data,
                'status' => 'success',
                'data' => $link
            ]);
        } else {
            return response()->json([
                'link' => $data,
                'status' => 'error',
                'message' => 'Failed to shorten URL'
            ], 500);
        }
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

        $url = $request->url;

        $response = Http::post('https://api.encurtador.dev/encurtamentos', [
            'url' => $url
        ]);

        $dataJson = $response->json();
        $data = $dataJson['urlEncurtada'];
        $link->slug = $request->slug;

        if ($data) {
            $link->url = $data;
            $link->save();

            return response()->json([
                'link' => $data,
                'status' => 'success',
                'data' => $link
            ]);
        } else {
            return response()->json([
                'link' => $data,
                'status' => 'error',
                'message' => 'Failed to shorten URL'
            ], 500);
        }
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
