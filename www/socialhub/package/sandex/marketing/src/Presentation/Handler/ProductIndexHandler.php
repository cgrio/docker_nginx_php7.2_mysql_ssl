<?php

namespace Sandex\Marketing\Presentation\Handler;

use Sandex\Marketing\Domain\UseCases\IProductUseCase;

class ProductIndexHandler
{
    private $service;

    public function __construct(IProductUseCase $service)
    {
        $this->service = $service;
    }

    public function handle($request)
    {
        return $this->service->index($request);
    }
}
