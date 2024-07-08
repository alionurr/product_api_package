<?php

namespace Product\ProductApi\Service;

use Product\ProductApi\Strategy\ProductSearchStrategy;

class ProductSearch
{
    protected $strategy;

    public function search(string $query)
    {
        return $this->strategy->search($query);
    }

    public function setStrategy(ProductSearchStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }
}