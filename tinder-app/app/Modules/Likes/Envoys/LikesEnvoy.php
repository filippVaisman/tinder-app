<?php

namespace App\Modules\Likes\Envoys;

use App\Modules\DataModels\TinderApi\TinderUser;
use App\Modules\Likes\Models\Like;
use App\Modules\Likes\Repositories\Contracts\LikesRepository;

class LikesEnvoy
{
    /**
     * @var LikesRepository
     */
    private LikesRepository $likesRepository;

    /**
     * LikesEnvoy constructor.
     * @param LikesRepository $likesRepository
     */
    public function __construct(LikesRepository $likesRepository)
    {
        $this->likesRepository = $likesRepository;
    }

    /**
     * @param TinderUser $tinderUser
     * @return Like
     */
    public function create(TinderUser $tinderUser): Like
    {
        return $this->likesRepository->create($tinderUser->toArray());
    }
}
