<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TrumeLabsService;
use Illuminate\Support\Facades\Log;

class TrumeLabsController extends Controller
{
    protected $trumeLabs;

    public function __construct(TrumeLabsService $trumeLabs)
    {
        $this->trumeLabs = $trumeLabs;
    }

    public function mockKitResult(Request $request)
    {
        try {
            $q = $request->get('q') ?? $request->get('id') ?? $request->get('email') ?? $request->get('kit_barcode');
    
            if (!$q) {
                \Log::warning('Kit search attempted with empty query.');
                return response()->json([
                    'status' => 'error',
                    'message' => 'Missing query',
                    'data' => []
                ], 422);
            }
    
            // Determine search type
            $query = [];
    
            if (filter_var($q, FILTER_VALIDATE_EMAIL)) {
                $query['email'] = $q;
            } elseif (is_numeric($q)) {
                $query['id'] = $q;
            } else {
                $query['kit_barcode'] = $q;
            }
    
            \Log::info('Kit search query parsed:', $query);
    
            $results = $this->trumeLabs->mockKitResult($query);
    
            \Log::info('Kit search results:', $results);
    
            return response()->json([
                'status' => 'success',
                'data' => $results
            ], 200);
        } catch (\Throwable $e) {
            \Log::error('Kit search error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
    
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred.',
                'exception' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }
    
}

