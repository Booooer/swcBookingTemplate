<?php

namespace App\Repositories;

use App\Models\Booking;
use Prettus\Repository\Eloquent\BaseRepository;

class BookingRepository extends BaseRepository
{
    public function model(): string
    {
        return Booking::class;
    }
}
