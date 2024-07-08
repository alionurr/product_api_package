<?php

namespace Product\ProductApi\Http\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Product\ProductApi\Service\ProductSearch;
use Product\ProductApi\Strategy\EbayProductSearch;
use Product\ProductApi\Strategy\AmazonProductSearch;
use Product\ProductApi\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function search($provider, Request $request, ProductSearch $productSearch)
    {   
        $query = $request->query('query');
        if (!$query) {
            return new JsonResponse(['error' => 'Query parameter is required'], 400);
        }

        $providerStrategyMapping = [
            'amazon' => new AmazonProductSearch,
            'ebay' => new EbayProductSearch
        ];

        $strategy = $providerStrategyMapping[$provider] ?? false;
        if (!$strategy) {
            return new JsonResponse(['error' => 'Unknown provider. You can use only amazon or ebay.']);
        }

        $productSearch->setStrategy($strategy);

        try {
            $products = $productSearch->search($query);
        } catch (ServerException $e) {
            return new JsonResponse($e->getMessage(), 500);
        } catch (ClientException $e) {
            return new JsonResponse($e->getMessage(), 500);
        }

        return ProductResource::collection(collect($products));
    }
}