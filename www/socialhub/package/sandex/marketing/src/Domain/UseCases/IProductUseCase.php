<?php

namespace Sandex\Marketing\Domain\UseCases;

use Sandex\Marketing\Domain\Entities\Product;
use Sandex\Marketing\Domain\Repositories\IProductRepository;

interface IProductUseCase
{
    public function __construct(IProductRepository $repository);
    public function index($request): array;
    public function show(int $id): Product;
    public function delete(int $id): bool;
    public function store(Product $product): Product;
    public function userProducts($request): array;
}
