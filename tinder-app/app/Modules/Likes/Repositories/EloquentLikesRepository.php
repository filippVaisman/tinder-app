<?php

namespace App\Modules\Likes\Repositories;

use App\Modules\Likes\Models\Like;
use App\Modules\Likes\Repositories\Contracts\LikesRepository;

class EloquentLikesRepository implements LikesRepository
{
    /**
     * @param $data
     * @return Like
     */
    public function create($data): Like
    {
        $q = Like::query();

        return $q->create($data);
    }
}
