<?php

namespace Sandex\Marketing\Data\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Sandex\Marketing\Domain\Entities\Product as ProductEntity;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = [ "name","description","sku","ncm"];

    public function toEntity(): ProductEntity
    {
        $entity = new ProductEntity();
        $entity->id = $this->id;
        $entity->name = $this->name;
        $entity->description = $this->description;
        $entity->sku = $this->sku;
        $entity->ncm = $this->ncm;
        $entity->creaated_at = new \DateTime(Carbon::parse($this->created_at)->toDateTimeString());
        $entity->updated_at = new \DateTime(Carbon::parse($this->updated_at)->toDateTimeString());
        return $entity;
    }
}
