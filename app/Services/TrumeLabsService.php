<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TrumeLabsService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.trumelabs.base_url');
        $this->apiKey = config('services.trumelabs.api_key');
    }

    protected function request($method, $endpoint, $data = [], $query = [])
    {
        $url = $this->baseUrl . $endpoint;

        $http = Http::withHeaders([
            'App-Key' => $this->apiKey,
            'Content-Type' => 'application/json',
        ]);

        if (in_array($method, ['post', 'patch'])) {
            $response = $http->$method($url, $data);
        } else {
            $response = $http->get($url, $query);
        }

        return $response->json();
    }

    public function createUser($data)         { return $this->request('post', '/v1/user', $data); }
    public function updateUser($id, $data)    { return $this->request('patch', "/v1/user/{$id}", $data); }
    public function getUser($query)           { return $this->request('get', '/v1/user', [], $query); }

    public function getUnregisteredKits()     { return $this->request('get', '/v1/unregistered-kits'); }
    public function registerKit($barcode, $data) { return $this->request('post', "/v1/kits/{$barcode}/register", $data); }
    public function updateKit($barcode, $data)   { return $this->request('patch', "/v1/kits/{$barcode}", $data); }

    public function getResults($query)        { return $this->request('get', '/v1/results', [], $query); }

    public function generateKit($data)        { return $this->request('post', '/v1/generate-kits', $data); }
    public function mockKitResult($data)      { return $this->request('post', '/v1/mock-kit-result', $data); }
}
