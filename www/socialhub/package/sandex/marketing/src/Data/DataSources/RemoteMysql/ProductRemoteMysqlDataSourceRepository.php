<?php

namespace Sandex\Marketing\Data\DataSources\RemoteMysql;

use Sandex\Marketing\Domain\Entities\Product;
use Sandex\Marketing\Data\Models\Product as ProductMysql;
use Sandex\Marketing\Domain\Repositories\IProductRepository;
use Illuminate\Support\Facades\Log;

class ProductRemoteMysqlDataSourceRepository implements IProductRepository
{
    public function index($request): array
    {
        return ProductMysql::paginate($request->limit)->toArray();
    }

    public function show(int $id): Product
    {
        $productMysql = ProductMysql::find($id);
        return $productMysql->toEntity();
    }

    public function delete(int $id): bool
    {
        try {
            ProductMysql::destroy($id);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function store(Product $product): Product
    {
        try {
            $model = ProductMysql::create((array)$product);
            return $model->toEntity();
        } catch (\Exception $e) {
            echo "Erros na comunicação com o banco de dados";
            if (\env("APP_ENV") == 'local') {
                Log::error($e);
            }
            return false;
        }
    }

    public function userProducts($request): array
    {
        return ProductMysql::where('authorId', $request->id)->paginate($request->limit)->toArray();
    }
}
