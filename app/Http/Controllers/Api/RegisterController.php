<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // 1) Validate input
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // 2) Create the user record (kit_id will be filled next)
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make(Str::random(16)),  // <-- dummy random password
        ]);

        // 3) Call TrumeLabs to generate a kit
        $response = Http::withToken(config('services.trumelabs.key'))
                        ->post(config('services.trumelabs.base') . '/generate-kits');

        // 4) Handle errors
        if (! $response->successful()) {
            // rollback user if you like:
            // $user->delete();
            return response()->json([
                'error' => 'Failed to generate kit',
                'details' => $response->json(),
            ], $response->status());
        }

        $payload = $response->json();

        // 5) Save the returned kitId on the user
        $user->update(['kit_id' => $payload['kitId']]);

        // 6) Return the JSON payload
        return response()->json($payload);
    }
}
