<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $items = Currency::query()->paginate();
        return CurrencyResource::collection($items);
    }

    public function show($date)
    {
        $item = Currency::query()->where('date', $date)->first();
        return new CurrencyResource($item);
    }
}
