<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::select('*')
            ->search(request()->search)
            ->get();

        return response()->json([
            'ok' => true,
            'data' => $clients,
            'message' => 'success',
        ]);

    }

    public function store(ClientStoreRequest $request)
    {
        $client = Client::create($request->all());

        return response()->json([
            'ok'    => true,
            'data'  => $client,
            'message' => 'success'
        ]);
    }

}