<?php

namespace Product\ProductApi\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'product_id' => $this->id,
            'product_title' => $this->title,
            'product_rating' => $this->rating,
        ];
    }
}