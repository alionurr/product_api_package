<?php

namespace Product\ProductApi\Adapters;

interface ProductAdapterInterface
{
    public function transform(array $data);
}