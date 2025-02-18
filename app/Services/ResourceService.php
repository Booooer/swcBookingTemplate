<?php

namespace App\Services;

use App\Data\Resource\ResourceStoreData;
use App\Repositories\ResourceRepository;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Exception;

final readonly class ResourceService
{
    public function __construct(
        private ResourceRepository $repository
    ) {
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    /**
     * @throws Exception
     */
    public function create(array $data)
    {
        try {
            $resourceData = ResourceStoreData::from($data);

            return $this->repository->create([
                'name'        => $resourceData->name,
                'type'        => $resourceData->type,
                'description' => $resourceData->description,
            ]);
        } catch (\Exception $e) {
            Log::channel('resource')->debug('Ошибка при создании ресурса: ' . $e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
}
