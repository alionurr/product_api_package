<?php

namespace Product\ProductApi\Adapters;

use stdClass;

class AmazonProductAdapter implements ProductAdapterInterface
{
    public function transform($data): Object
    {
        $product = new stdClass;
        $product->id = $data->asin;
        $product->title = $data->product_title;
        $product->rating = $data->product_star_rating;
        return $product;
    }
}