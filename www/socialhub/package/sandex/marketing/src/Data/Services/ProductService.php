<?php

namespace Sandex\Marketing\Data\Services;

use Sandex\Marketing\Domain\Entities\Product;
use Sandex\Marketing\Domain\UseCases\IProductUseCase;
use Sandex\Marketing\Domain\Repositories\IProductRepository;

class ProductService implements IProductUseCase
{
    public function __construct(IProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($request): array
    {
        return $this->repository->index($request);
    }

    public function show(int $id): Product
    {
        return $this->repository->show($id);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function store(Product $product): Product
    {
        return $this->repository->store($product);
    }

    public function userProducts($request): array
    {
        return $this->repository->userProducts($request);
    }
}
