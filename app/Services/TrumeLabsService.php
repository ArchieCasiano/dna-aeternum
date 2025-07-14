<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TrumeLabsService
{
    protected $baseUrl;
    protected $apiKey;
    protected $appKey;
    
    public function __construct()
    {
        $this->baseUrl = config('services.trumelabs.base_url');
        $this->apiKey  = config('services.trumelabs.api_key');  // Bearer Token
        $this->appKey  = config('services.trumelabs.app_key');  
    }

    protected function request($method, $endpoint, $data = [], $query = [])
    {
        $url = $this->baseUrl . $endpoint;

        $http = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'App-Key' => $this->apiKey,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);

        if (in_array($method, ['post', 'patch'])) {
            $response = $http->$method($url, $data);
        } else {
            $response = $http->get($url, $query);
        }

        return $response->json();
    }

    public function mockKitResult(array $query = [])
    {
        // Call real TrumeLabs API endpoint
        return $this->request('get', '/v1/results', [], $query);
    }


}
