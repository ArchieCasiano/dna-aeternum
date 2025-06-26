<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TrumeLabsService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.trumelabs.api_key');
        $this->baseUrl = config('services.trumelabs.base_url');
    }

    protected function request($method, $endpoint, $data = [])
    {
        $url = rtrim($this->baseUrl, '/') . '/' . ltrim($endpoint, '/');
    
        $response = Http::withToken($this->apiKey)
                        ->{$method}($url, $data);
    
        if (!$response->successful()) {
            Log::error('TrumeLabs API Error', [
                'url' => $url,
                'status' => $response->status(),
                'body' => $response->body()
            ]);
        }
    
        return $response->json();
    }
    

    public function createUser($userData)
    {
        return $this->request('post', '/v1/create-user', $userData);
    }

    public function registerKit($kitData)
    {
        return $this->request('post', '/v1/generate-kits', data: $kitData);
    }

    public function getResults($kitId)
    {
        return $this->request('get', "/v1/kits/{$kitId}/results");
    }

    public function getMock($mock_kitId)
    {
        return $this->request('post', "/v1/mock-kit-result", data: $mock_kitId);
    }
}
