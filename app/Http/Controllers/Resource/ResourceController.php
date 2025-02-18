<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceStoreRequest;
use App\Http\Resources\ResourceResource;
use App\Services\ResourceService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Prettus\Validator\Exceptions\ValidatorException;

class ResourceController extends Controller
{
    public function __construct(
        private readonly ResourceService $service
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return ResourceResource::collection($this->service->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws ValidatorException
     */
    public function store(ResourceStoreRequest $request): AnonymousResourceCollection
    {
        return ResourceResource::collection([$this->service->create($request->validated())]);
    }
}
