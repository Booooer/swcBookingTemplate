<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Services\BookingService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ResourceBookingController extends Controller
{
    public function __construct(
        private readonly BookingService $service
    ) {
    }

    public function getResourceBookings(int $id): AnonymousResourceCollection
    {
        return BookingResource::collection($this->service->getBookings($id));
    }
}
