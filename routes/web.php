<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrumeLabsController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| These routes return frontend views or static test data for display.
*/

// Route::get('/', fn() => view('auth.login'))->name('login');

// $kits = [
//     [
//         'id' => '1',
//         'email' => 'john@example.com',
//         'bio_age_results' => [
//             [
//                 'kit_barcode' => 'KIT12345',
//                 'chronological_age' => 30,
//                 'biological_age' => 28,
//                 'peer_biological_age_score' => 92,
//                 'collection_date' => now(),
//                 'share_link' => 'https://example.com/results/123'
//             ]
//         ],
//         'genetic_results' => [
//             [
//                 'kit_barcode' => 'KIT12345',
//                 'markers' => [
//                     ['marker' => 'rs123', 'risk' => 'High', 'gene' => 'BRCA1', 'position' => '17q21.31'],
//                 ]
//             ]
//         ]
//     ],
//     [
//         'id' => '2',
//         'email' => 'jane@example.com',
//         'bio_age_results' => [],
//         'genetic_results' => []
//     ],
//     [
//         'id' => '3',
//         'email' => 'michael@testmail.com',
//         'bio_age_results' => [
//             [
//                 'kit_barcode' => 'KIT56789',
//                 'chronological_age' => 45,
//                 'biological_age' => 47,
//                 'peer_biological_age_score' => 68,
//                 'collection_date' => now()->subDays(5),
//                 'share_link' => 'https://example.com/results/567'
//             ]
//         ],
//         'genetic_results' => [
//             [
//                 'kit_barcode' => 'KIT56789',
//                 'markers' => [
//                     ['marker' => 'rs456', 'risk' => 'Moderate', 'gene' => 'TP53', 'position' => '17p13.1'],
//                     ['marker' => 'rs789', 'risk' => 'Low', 'gene' => 'APOE', 'position' => '19q13.32'],
//                 ]
//             ]
//         ]
//     ],
//     [
//         'id' => '4',
//         'email' => 'alice@genetica.org',
//         'bio_age_results' => [],
//         'genetic_results' => [
//             [
//                 'kit_barcode' => 'KIT99999',
//                 'markers' => [
//                     ['marker' => 'rs999', 'risk' => 'High', 'gene' => 'CFTR', 'position' => '7q31.2'],
//                     ['marker' => 'rs321', 'risk' => 'Low', 'gene' => 'MTHFR', 'position' => '1p36.22'],
//                 ]
//             ]
//         ]
//     ],
// ];


// // Search route
// Route::get('/kit-search', function (Illuminate\Http\Request $request) use ($kits) {
//     $query = $request->get('q');
//     $result = collect($kits)->first(fn($kit) => $kit['id'] === $query || $kit['email'] === $query);

//     return view('dashboard.kit-search', ['results' => $result]);
// })->name('kit.search');


// Route::get('/kit-search', function (Request $request) {
//     $query = $request->get('q');

//     if (!$query) {
//         return view('dashboard.kit-search', ['results' => collect(), 'query' => $query]);
//     }

//     $controller = app(TrumeLabsController::class);
//     $response = $controller->mockKitResult($request);

//     $data = json_decode($response->getContent(), true);

//     return view('dashboard.kit-search', [
//         'results' => collect($data['data'] ?? []),
//         'query' => $query
//     ]);
// })->name('kit.search');

// Route::view('/', 'dashboard.index-dashboard')->name('index-dashboard');

Route::view('/', 'dashboard.index-dashboard')->name('index-dashboard');


Route::get('/users-search', function (Request $originalRequest) {
    $q = $originalRequest->query('q');

    if (!$q) {
        return view('dashboard.kit-search', ['results' => null]);
    }

    $controller = app(TrumeLabsController::class);

    // Forward the request to internal API
    $apiRequest = Request::create('/get-user-query', 'GET');
    $apiRequest->query->set('q', $q);

    $response = $controller->getUserViaApi($apiRequest);
    $userData = json_decode($response->getContent(), true)['data'] ?? null;

    if (!$userData || empty($userData['kits'])) {
        return view('dashboard.kit-search', ['results' => null]);
    }

    $bioAgeResults = [];
    $healthData = [];
    $kitDetails = [];

    foreach ($userData['kits'] as $kit) {
        // Biological age display (placeholder logic)
        $bioAgeResults[] = [
            'kit_barcode' => $kit['barcode'],
            'chronological_age' => \Carbon\Carbon::parse($userData['date_of_birth'])->age,
            'biological_age' => rand(20, 60), // Replace with actual value later
            'peer_biological_age_score' => rand(50, 100), // Replace with actual value later
            'collection_date' => $kit['sample_collection_date'],
            'share_link' => url('/share/' . $kit['barcode']),
        ];

        // Health data (include all fields)
        if (!empty($kit['health_status'])) {
            $healthData[] = [
                'kit_barcode' => $kit['barcode'],
                'details' => $kit['health_status'] // No filtering, full structure
            ];
        }

        // Full kit metadata
        $kitDetails[] = [
            'barcode' => $kit['barcode'],
            'status' => $kit['status'],
            'registration_date' => $kit['registration_date'],
            'sample_collection_date' => $kit['sample_collection_date'],
            'in_lab_date' => $kit['in_lab_date'],
            'processed_date' => $kit['processed_date']
        ];
    }

    return view('dashboard.kit-search', [
        'results' => [
            'user' => [
                'id' => $userData['id'],
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'email' => $userData['email'],
                'phone' => $userData['phone'],
                'date_of_birth' => $userData['date_of_birth'],
            ],
            'bio_age_results' => $bioAgeResults,
            'kit_details' => $kitDetails,
            'health_data' => $healthData,
            'genetic_results' => [] // Add later when ready
        ]
    ]);
})->name('users.search');
