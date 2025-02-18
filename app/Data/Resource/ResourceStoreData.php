<?php

namespace App\Data\Resource;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ResourceStoreData extends Data
{
    public function __construct(
        public string  $name,
        public string  $type,
        public ?string $description
    ) {
    }
}
