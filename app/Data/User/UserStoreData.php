<?php

namespace App\Data\User;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class UserStoreData extends Data
{
    public function __construct(
        public string  $name,
        public string  $password,
        public ?string $email,
    ) {
    }
}
