<?php

namespace App\Http\Controllers\Api\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleStoreRequest;
use App\Models\Client;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function store(SaleStoreRequest $request)
    {
        $data = $request->validated();

        if ((int)$data['total_price'] > 5000000) {
            $data['discount_percent'] = 0;
        }

        $sale = Sales::create($data);
        return response()->json([
            'ok' => true,
            'data' => $sale,
            'message' => 'Venta registrada satisfactoriamente'
        ]);
    }

    public function filter(string $start, string $end)
    {
        $sales = Sales::select('*')
            ->whereBetween('created_at', [$start, $end])
            ->get();

        return response()->json([
            'ok' => true,
            'data' => $sales,
            'message' => 'Venta registrada satisfactoriamente'
        ]);
    }

    public function salesByClient(Client $client)
    {

        return response()->json([
            'ok' => true,
            'data' => $client->r_sales,
            'message' => 'Venta registrada satisfactoriamente'
        ]);
    }
}
