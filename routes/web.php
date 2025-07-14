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


Route::get('/kit-search', function (Request $request) {
    $query = $request->get('q');

    if (!$query) {
        return view('dashboard.kit-search', ['results' => collect(), 'query' => $query]);
    }

    $controller = app(TrumeLabsController::class);
    $response = $controller->mockKitResult($request);

    $data = json_decode($response->getContent(), true);

    return view('dashboard.kit-search', [
        'results' => collect($data['data'] ?? []),
        'query' => $query
    ]);
})->name('kit.search');

Route::view('/', 'dashboard.index-dashboard')->name('index-dashboard');

