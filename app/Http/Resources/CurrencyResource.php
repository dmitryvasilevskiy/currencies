<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'date' => $this->resource->date->format('Y-m-d'),
            'currencies' => $this->resource->currencies,
        ];
    }
}
