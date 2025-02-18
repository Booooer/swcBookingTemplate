<?php

namespace App\Repositories;

use App\Models\Resource;
use Prettus\Repository\Eloquent\BaseRepository;

class ResourceRepository extends BaseRepository
{
    public function model(): string
    {
        return Resource::class;
    }
}
