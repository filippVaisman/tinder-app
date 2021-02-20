<?php

namespace App\Modules\Likes\Repositories\Contracts;

use App\Modules\Likes\Models\Like;

interface LikesRepository
{
    /**
     * @param $data
     * @return Like
     */
    public function create($data): Like;
}
