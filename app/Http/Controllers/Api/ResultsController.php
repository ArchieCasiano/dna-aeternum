<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ResultsController extends Controller
{
    public function show($kitId)
    {
        $response = Http::withToken(config('services.trumelabs.key'))
                        ->get(config('services.trumelabs.base') . "/kits/{$kitId}");

        // Proxy the exact status and body
        return response($response->body(), $response->status())
               ->header('Content-Type', 'application/json');
    }
}
