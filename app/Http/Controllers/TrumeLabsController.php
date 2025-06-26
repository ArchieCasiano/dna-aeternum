<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TrumeLabsService;

class TrumeLabsController extends Controller
{
    protected $trumeLabs;

    public function __construct(TrumeLabsService $trumeLabs)
    {
        $this->trumeLabs = $trumeLabs;
    }

    // 1. Create User
    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $response = $this->trumeLabs->createUser($validated);
        return response()->json($response);
    }

    // 2. Register Test Kit
    public function registerKit(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|string',
            'kit_code' => 'required|string',
        ]);

        $response = $this->trumeLabs->registerKit($validated);
        return response()->json($response);
    }

    // 3. Retrieve Result
    public function getResults($kitId)
    {
        $response = $this->trumeLabs->getResults($kitId);
        return response()->json($response);
    }


     // 3. Mock Result
     public function getMock($mock_kitId)
     {
         $response = $this->trumeLabs->getMock($mock_kitId);
         return response()->json($response);
     }
}
