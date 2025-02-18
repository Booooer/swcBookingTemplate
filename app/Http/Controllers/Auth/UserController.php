<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Prettus\Validator\Exceptions\ValidatorException;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $service
    ) {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws ValidatorException
     */
    public function store(UserStoreRequest $request): AnonymousResourceCollection
    {
        return UserResource::collection([$this->service->create($request->validated())]);
    }
}
