<?php

namespace Product\ProductApi\Adapters;

use stdClass;

class EbayProductAdapter implements ProductAdapterInterface
{
    public function transform($data): Object
    {
        $product = new stdClass;
        $product->id = $data->product_id;
        $product->title = $data->product_title;
        $product->rating = $data->product_rating;
        return $product;
    }
}