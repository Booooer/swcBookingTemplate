<?php

namespace App\Services;

use App\Data\Booking\BookingStoreData;
use App\Repositories\BookingRepository;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Exception;

readonly class BookingService
{
    public function __construct(
        private BookingRepository $repository
    ) {
    }

    /**
     * @throws Exception
     */
    public function create(array $data)
    {
        try {
            $bookingData = BookingStoreData::from($data);

            return $this->repository->create([
                'resource_id' => $bookingData->resourceId,
                'user_id'     => $bookingData->userId,
                'start_time'  => $bookingData->startTime,
                'end_time'    => $bookingData->endTime,
            ]);
        } catch (\Exception $e) {
            Log::channel('booking')->debug('Ошибка при создании брони: ' . $e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function getBookings(int $resourceId): array
    {
        return $this->repository->findByField('resource_id', $resourceId)->all();
    }
}
