<?php

namespace Sandex\Marketing\Data\DataSources\LocalStatic;

use Sandex\Marketing\Domain\Entities\Product;
use Sandex\Marketing\Data\Models\Product as ProductStatic;
use Sandex\Marketing\Domain\Repositories\IProductRepository;

class ProductLocalStaticDataSourceRepository implements IProductRepository
{
    public function index($request): array
    {
        $eloquent = ProductStatic::paginate(2)->toArray();
        $static = [
            [
                'name' => 'static title 1',
                'sku' => 'static slug 1',
                'description' => 'static content 1',
            ],
            [
                'name' => 'static title 2',
                'sku' => 'static slug 2',
                'description' => 'static content 2',
            ]
        ];

        return [
            'eloquent' => $eloquent,
            'static' => $static,
        ];
    }

    public function show(int $id): Product
    {
        $product = new Product();
        return $product;
    }

    public function delete(int $id): bool
    {
        return false;
    }

    public function store(Product $product): bool
    {
        return false;
    }

    public function userProducts($request): array
    {
        return ['STATIC TEST'];
    }
}
