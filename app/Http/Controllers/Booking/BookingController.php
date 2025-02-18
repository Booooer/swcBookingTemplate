<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Resources\BookingResource;
use App\Services\BookingService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Prettus\Validator\Exceptions\ValidatorException;

class BookingController extends Controller
{
    public function __construct(
        private readonly BookingService $service
    ) {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws ValidatorException
     */
    public function store(BookingStoreRequest $request): AnonymousResourceCollection
    {
        return BookingResource::collection([$this->service->create($request->validated())]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): int
    {
        return $this->service->delete($id);
    }
}
