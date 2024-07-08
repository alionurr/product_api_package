<?php

namespace Product\ProductApi\Strategy;

use GuzzleHttp\Client;
use Product\ProductApi\Adapters\EbayProductAdapter;
use Product\ProductApi\Strategy\ProductSearchStrategy;

class EbayProductSearch implements ProductSearchStrategy
{   
    public function search($value)
    {
        $client = new Client(['base_uri' => config('product.ebay_base_uri')]);

        $response = $client->get('/search', [
            'query' => ['q' => $value],
            'headers' => [
                'X-RapidAPI-Key' => config('product.ebay_api_key'),
                'X-RapidAPI-Host' => config('product.ebay_host'),
                ]
        ]);

        $products = json_decode($response->getBody()->getContents());
        
        return array_map([new EbayProductAdapter, 'transform'], $products->data);
    }
}