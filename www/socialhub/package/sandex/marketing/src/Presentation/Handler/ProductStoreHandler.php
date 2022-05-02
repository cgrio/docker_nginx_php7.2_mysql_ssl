<?php

namespace Sandex\Marketing\Presentation\Handler;

use Sandex\Marketing\Domain\Entities\Product;
use Sandex\Marketing\Domain\UseCases\IProductUseCase;

class ProductStoreHandler
{
    private $service;

    public function __construct(IProductUseCase $service)
    {
        $this->service = $service;
    }

    public function handle($request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->ncm = $request->ncm;
        $product->description = $request->description;
        return $this->service->store($product);
    }
}
