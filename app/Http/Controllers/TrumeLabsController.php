<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TrumeLabsService;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TrumeLabsService;

class TrumeLabsController extends Controller
{
    protected $service;

    public function __construct(TrumeLabsService $service)
    {
        $this->service = $service;
    }

    public function createUser(Request $request)
    {
        return response()->json($this->service->createUser($request->all()));
    }

    public function updateUser($id, Request $request)
    {
        return response()->json($this->service->updateUser($id, $request->all()));
    }

    public function getUser(Request $request)
    {
        return response()->json($this->service->getUser($request->all()));
    }

    public function getUnregisteredKits()
    {
        return response()->json($this->service->getUnregisteredKits());
    }

    public function registerKit($barcode, Request $request)
    {
        return response()->json($this->service->registerKit($barcode, $request->all()));
    }

    public function updateKit($barcode, Request $request)
    {
        return response()->json($this->service->updateKit($barcode, $request->all()));
    }

    public function getResults(Request $request)
    {
        return response()->json($this->service->getResults($request->all()));
    }

    public function generateKit(Request $request)
    {
        return response()->json($this->service->generateKit($request->all()));
    }

    public function mockKitResult(Request $request)
    {
        return response()->json($this->service->mockKitResult($request->all()));
    }
}

