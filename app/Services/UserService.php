<?php

namespace App\Services;

use App\Data\User\UserStoreData;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Exception;

final readonly class UserService
{
    public function __construct(
        private UserRepository $repository
    ) {
    }

    /**
     * @throws Exception
     */
    public function create(array $data)
    {
        try {
            $userData = UserStoreData::from($data);

            return $this->repository->create([
                'name'     => $userData->name,
                'email'    => $userData->email,
                'password' => Hash::make($userData->password),
            ]);
        } catch (\Exception $e) {
            Log::debug('Ошибка при создании пользователя: ' . $e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
}
