<?php

namespace Sandex\Marketing\Domain\Repositories;

use Sandex\Marketing\Domain\Entities\Product;

interface IProductDataRepository
{
    public function index($request): array;
    public function show(int $id): Product;
    public function delete(int $id): bool;
    public function store(Product $product): Product;
    public function userProducts($request): array;
}
