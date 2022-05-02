<?php

namespace Sandex\Marketing\Domain\Entities;

use DateTime;

class Product
{
    public int $id;
    public int $authorId;
    public string $name;
    public string $sku;
    public string $ncm;
    public string $description;
    public bool $status;
    public DateTime $created_at;
    public DateTime $updated_at;
}
