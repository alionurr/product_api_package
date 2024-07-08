<?php

namespace Product\ProductApi\Strategy;

use GuzzleHttp\Client;
use Product\ProductApi\Adapters\AmazonProductAdapter;
use Product\ProductApi\Strategy\ProductSearchStrategy;

class AmazonProductSearch implements ProductSearchStrategy
{   
    public function search($value)
    {
        $client = new Client(['base_uri' => config('product.amazon_base_uri')]);
        $response = $client->get('/search', [
            'query' => ['query' => $value],
            'headers' => [
                'X-RapidAPI-Key' => config('product.amazon_api_key'),
                'X-RapidAPI-Host' => config('product.amazon_host'),
                ]
            ]);

        $products = json_decode($response->getBody()->getContents());       
    
        return array_map([new AmazonProductAdapter, 'transform'], $products->data->products);
    }
}