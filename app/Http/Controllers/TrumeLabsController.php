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
    public function getUserViaApi(Request $request)
    {
        try {
            // Priority: q, then id/email
            $q = trim($request->get('q'));
            $id = trim($request->get('id'));
            $email = trim($request->get('email'));
    
            // Build query based on which param is present
            $query = [];
    
            if ($q) {
                if (filter_var($q, FILTER_VALIDATE_EMAIL)) {
                    $query['email'] = $q;
                } elseif (is_numeric($q)) {
                    $query['id'] = $q;
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Invalid query format',
                        'data' => []
                    ], 422);
                }
            } elseif ($email) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Invalid email format',
                        'data' => []
                    ], 422);
                }
                $query['email'] = $email;
            } elseif ($id) {
                if (!is_numeric($id)) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Invalid ID format',
                        'data' => []
                    ], 422);
                }
                $query['id'] = $id;
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Missing query',
                    'data' => []
                ], 422);
            }
    
            \Log::info('User search query parsed:', $query);
    
            // Call TrumeLabs API
            $user = $this->trumeLabs->getUser($query);
    
            if (!$user || isset($user['error'])) {
                return response()->json([
                    'status' => 'error',
                    'message' => $user['error'] ?? 'User not found.',
                    'data' => []
                ], 404);
            }
    
            return response()->json([
                'status' => 'success',
                'data' => $user
            ]);
    
        } catch (\Throwable $e) {
            \Log::error('User search error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
    
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred.',
                'exception' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }
    
}

