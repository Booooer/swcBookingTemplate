<?php

namespace App\Data\Booking;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class BookingStoreData extends Data
{
    public function __construct(
        public int    $resourceId,
        public int    $userId,
        public string $startTime,
        public string $endTime,
    ) {
    }
}
